<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('app');
    $this->load->helper('cookie');
    $this->load->model('checkout_model','checkout');
    $this->load->model('member_model','member');

    if (!isset($_COOKIE['checkout'])) {
			$sid = session_id().date('His');
			setcookie('checkout', $sid, time() + (86400), "/"); // 86400 = 1 day
		}

  }

  function index($sid='')
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    if (!empty($sid)) {

      $sid = hex2bin(base64_decode($sid));

      $user = $this->ion_auth->user()->row();

      $data['queryOrder'] = $this->db->where('sid',$sid)->get('orders');

      $row  = $data['queryOrder']->row();

      $data['user'] = $this->ion_auth->user($row->user_id)->row();

      $data['orderItem'] = $this->db->where('order_id',$row->order_id)->order_by('order_id','asc')->from('order_item')->join('mentor_class','mentor_class.mentor_class_id=order_item.product_id')->get();

      $this->load->view('include/header');

      $this->load->view('checkout',$data);
      $this->load->view('include/footer');

    }else {
      redirect('/');
    }
  }

  public function order($id)
  {
    if (!isset($_COOKIE['checkout']) || !$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['queryCheckout'] = $this->db->where('user_id',$user->id)->where('checkout',1)->where('cart_id',$id)->get('cart');
    $data['add'] = $this->db->where('user_id',$user->id)->order_by('address_id','desc')->get('address')->row();

    $this->load->view('include/header');
    $this->load->view('checkout',$data);
    $this->load->view('include/footer');
  }

  public function docheckout()
  {
    if (!isset($_COOKIE['checkout'])) {
			$sid = session_id().date('His');
			setcookie('checkout', $sid, time() + (86400), "/"); // 86400 = 1 day
		}

    if (isset($_POST['sid'])) {

      $sid_post = $this->input->post('sid',true);

      $sid = base64_encode(bin2hex($sid_post));

      //GET DATA FROM CART
      $getCart = $this->db->query("INSERT INTO orders (order_id, user_id, sid, ip_address, payment, uniq_code, total, order_date, order_time) SELECT cart_id, user_id, sid, ip_address, payment, uniq_code, total, order_date, order_time FROM cart WHERE sid = '".$sid_post."'");

      //GET ITEM ORDER
      $cart   = $this->db->where('sid', $sid_post)->get('cart')->row();
      $order  = $this->db->order_by('order_id','desc')->get('orders')->row();

      $insertItem = $this->db->query('INSERT INTO order_item (order_id, product_id, qty, order_date, order_time) SELECT cart_id, product_id, qty, order_date, order_time FROM cart_item WHERE cart_id = "'.$cart->cart_id.'"');

      if ($getCart) {
        $this->db->where('sid', $sid_post)->delete('cart');
      }

      if ($insertItem) {
        //$this->db->where('order_id', $cart->cart_id)->set('order_id',$order->order_id)->update('order_item');
        $this->db->where('cart_id', $cart->cart_id)->delete('cart_item');

        // UPDATE INVOICE

        $inv = $this->db->order_by('invoice', 'DESC')->get('orders')->row();

        if ($this->checkout->getAllOrders()->num_rows() == 0) {
          $invoice = 4011;
        }else {
          $invoice = $inv->invoice + 1;
        }

        $updateInvoice = $this->db->where('sid',$sid_post)->set('invoice', $invoice)->update('orders');

        if ($updateInvoice) {

          // SEND EMAIL INVOICE FOR BUYER
          $data = [
            'queryInvoice' => $this->db->where('sid', $sid_post)->order_by('order_id','desc')->get('orders'),
            'user' => $this->ion_auth->user()->row()
          ];

          $row      = $data['queryInvoice']->row();
          $user     = $this->ion_auth->user()->row();

          $name     = "Billing IDTalenta";
          $email    = $user->email;
          $subject  = "Invoice - ".$invoice.' telah dibuat.';
          $message  = $this->load->view('notification/invoice',$data,true);

          $this->checkout->email($email,$subject,$message,$name);

          // NOTIFICATION TO MENTOR
          $dataEmail = $this->db->where('order_id', $row->order_id)->get('order_item');

          if ($dataEmail->num_rows() > 0) {
            foreach ($dataEmail->result() as $key => $mail) {
              $this->checkout->notif_purchase_mentor($mail->product_id, $sid_post);
            }
          }
        }

      }

    }

    delete_cookie('cart');

    $newID = session_id().date('His');

    setcookie('cart', $newID, time() + (86400 * 1), "/"); // 86400 = 1 day


    redirect('checkout/index/'.$sid,'refresh');
  }

  public function payment($sid)
  {

    if (!isset($_COOKIE['checkout']) || !$this->ion_auth->logged_in() ) {
      redirect('/');
    }

    $data['sid'] = hex2bin(base64_decode($sid));

    $data['payment'] = $this->db->where('sid', $data['sid'])->get('orders')->row();

    $this->load->view('include/header');
    $this->load->view('payment',$data);
    $this->load->view('include/footer');
  }

  public function confirmation()
  {
    $emailuser    = $this->input->post('email',true);
    $user_id      = $this->input->post('user_id',true);
    $invoice      = $this->input->post('invoice',true);
    $sid          = $this->input->post('sid',true);
    //$bankaccount  = $this->input->post('bank-account',true);
    //$bankfrom     = $this->input->post('bankfrom',true);
    //$bankto       = $this->input->post('bankto',true);
    $ammount      = $this->input->post('ammount',true);
    $transferdate = $this->input->post('transfer-date',true);

    $this->form_validation->set_rules('invoice', 'No. Invoive', 'required|callback_invoice_check');
		//$this->form_validation->set_rules('bank-account', 'No. Rekening', 'required');
    //$this->form_validation->set_rules('bankfrom', 'Bank Dari', 'required');
    //$this->form_validation->set_rules('bankto', 'Bank Tujuan', 'required');
    $this->form_validation->set_rules('ammount', 'Jumlah Transfer', 'required');
    $this->form_validation->set_rules('transfer-date', 'Tanggal Transfer', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('include/header');
      $this->load->view('payment');
      $this->load->view('include/footer');
      //redirect('payment/'.base64_encode(bin2hex($sid)));
    }else {
      $data = array(
        'user_id' => $user_id,
        'invoice' => $invoice,
        'ammount' => $ammount,
        'payment_date' => $transferdate
      );

      $insertData = $this->db->insert('payment_confirmation',$data);

      if ($insertData) {
        $name = "Billing IDTalenta";
        $email = "yudisketsa@gmail.com";
        $subject = "Konfirmasi Pembayaran Invoice ".$invoice;
        $message = "Data Konfirmasi: <br>
        Email : ".$emailuser."<br>
        No. Invoice : ".$invoice."<br>
        Jumlah Transfer : ".$ammount."<br>
        Tgl. Transfer : ".$transferdate;

        $this->checkout->email($email,$subject,$message,$name);

        $this->session->set_flashdata('confirmation',true);

        redirect('payment/'.base64_encode(bin2hex($sid)));
      }
    }

  }

  public function invoice_check($value)
  {
    // CHECK INVOICE NUMBER
    $getNum = $this->db->where('invoice', $value)->get('orders');

    if ($getNum->num_rows() > 0) {
      return true;
    } else {
      $this->form_validation->set_message('invoice_check', 'The {field} field not match with invoice number');
      return false;
    }

  }

  public function invoice()
  {
    $sid = $this -> db -> order_by('order_id','desc') -> get('orders')->row();

    $sid = $sid -> sid;

    $this->checkout->notif_purchase_mentor(1,$sid);

    $data['queryInvoice'] = $this->db->where('sid', $sid)->order_by('order_id','desc')->get('orders');
    $data['user'] = $this->ion_auth->user()->row();

    $this->load->view('notification/invoice',$data);
  }

  public function testing()
  {
    $data = [
      'queryInvoice' => $this->db->where('sid', 'dql5bjj4muud7rqlrtmvjlh279sf14sd101824')->order_by('order_id','desc')->get('orders'),
      'user' => $this->ion_auth->user()->row()
    ];
    $this->load->view('notification/invoice',$data);
  }

}
