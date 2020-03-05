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

  function index($sid)
  {
    if (!$this->ion_auth->logged_in() || !empty($sid)) {

      if (!isset($_COOKIE['cart'])) {
  			$sid = session_id().date('His');
  			setcookie('cart', $sid, time() + (86400), "/"); // 86400 = 1 day
  		}

      $user = $this->ion_auth->user()->row();

      $data['queryCheckout'] = $this->db->where('user_id',$user->id)->where('checkout',1)->order_by('cart_id','desc')->get('cart');
      $data['add'] = $this->db->where('user_id',$user->id)->order_by('address_id','desc')->get('address')->row();

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

      $sid = $this->input->post('sid',true);

      //GET DATA FROM CART
      $getCart = $this->db->query("INSERT INTO orders SELECT * FROM cart WHERE sid='".$sid."'");

      //GET ITEM ORDER
      $cart   = $this->db->where('sid', $sid)->get('cart')->row();
      $order  = $this->db->order_by('order_id','desc')->get('orders')->row();

      $insertItem = $this->db->query('INSERT INTO order_item (order_id, product_id, qty, order_date, order_time) SELECT cart_id, product_id, qty, order_date, order_time FROM cart_item WHERE cart_id = "'.$cart->cart_id.'"');

      if ($getCart) {
        $this->db->where('sid', $sid)->delete('cart');
      }

      if ($insertItem) {
        //$this->db->where('order_id', $cart->cart_id)->set('order_id',$order->order_id)->update('order_item');
        $this->db->where('cart_id', $cart->cart_id)->delete('cart_item');

        // SEND EMAIL INVOICE FOR BUYER
        $data = [

          'queryInvoice' => $this->db->where('sid', $sid)->order_by('order_id','desc')->get('orders'),
          'user' => $this->ion_auth->user()->row()
        ];

        $row = $data['queryInvoice']->row();

        $name = "Billing ARTAdemi";
        $email = $user->email;
        $subject = "Invoice - ".$row->invoice.' telah dibuat.';
        $message = $this->load->view('notification/invoice',$data,true);

        $this->checkout->email($email,$subject,$message,$name);

        // NOTIFICATION TO MENTOR
        $dataEmail = $this->db->where('order_id', $row->order_id)->get('order_item');

        if ($dataEmail->num_rows() > 0) {
          foreach ($dataEmail->result() as $key => $mail) {
            $this->checkout->notif_purchase_mentor($mail->product_id, $sid);
          }
        }


      }

    }

    delete_cookie('cart');

    redirect('checkout/index/'.$sid);
  }

  public function payment()
  {

    if (!isset($_COOKIE['checkout']) || !$this->ion_auth->logged_in() ) {
      redirect('/');
    }

    $this->load->view('include/header');
    $this->load->view('payment');
    $this->load->view('include/footer');
  }

  public function confirmation()
  {
    $emailuser    = $this->input->post('email',true);
    $user_id      = $this->input->post('user_id',true);
    $invoice      = $this->input->post('invoice',true);
    //$bankaccount  = $this->input->post('bank-account',true);
    //$bankfrom     = $this->input->post('bankfrom',true);
    //$bankto       = $this->input->post('bankto',true);
    $ammount      = $this->input->post('ammount',true);
    $transferdate = $this->input->post('transfer-date',true);

    $this->form_validation->set_rules('invoice', 'No. Invoive', 'required');
		//$this->form_validation->set_rules('bank-account', 'No. Rekening', 'required');
    //$this->form_validation->set_rules('bankfrom', 'Bank Dari', 'required');
    //$this->form_validation->set_rules('bankto', 'Bank Tujuan', 'required');
    $this->form_validation->set_rules('ammount', 'Jumlah Transfer', 'required');
    $this->form_validation->set_rules('transfer-date', 'Tanggal Transfer', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('include/header');
      $this->load->view('payment');
      $this->load->view('include/footer');
    }else {
      $data = array(
        'user_id' => $user_id,
        'invoice' => $invoice,
        'ammount' => $ammount,
        'transfer_date' => $transferdate
      );

      $insertData = $this->db->insert('confirmation',$data);

      if ($insertData) {
        $name = "Support Dripsweet";
        $email = "dripsweet.id@gmail.com";
        $subject = "Konfirmasi Pembayaran Invoice ".$invoice;
        $message = "Data Konfirmasi: <br>
        Email : ".$emailuser."<br>
        No. Invoice : ".$invoice."<br>
        Rekening Pengirim : ".$bankaccount."<br>
        Bank Dari : ".$bankfrom."<br>
        Bank Tujuan :".$bankto."<br>
        Jumlah Transfer : ".$ammount."<br>
        Tgl. Transfer : ".$transferdate;

        $this->checkout->email($email,$subject,$message,$name);

        $this->session->set_flashdata('confirmation',true);

        redirect('checkout/payment');
      }
    }

  }

  public function invoice()
  {
    $sid = $this -> db -> order_by('order_id','desc') -> get('orders')->row();

    $sid = $sid -> sid;

    $this->checkout->notif_purchase_mentor(1,$sid);

    //$data['queryInvoice'] = $this->db->where('sid', $sid)->order_by('order_id','desc')->get('orders');
    //$data['user'] = $this->ion_auth->user()->row();

    //$this->load->view('notification/invoice',$data);
  }

}
