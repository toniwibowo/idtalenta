<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->library('store');
    $this->load->model('checkout_model','checkout');
    $this->load->model('member_model','member');

    if (!isset($_COOKIE['checkout'])) {
			$sid = session_id().date('His');
			setcookie('cart', $sid, time() + (86400), "/"); // 86400 = 1 day
		}

  }

  function index()
  {
    if (!isset($_COOKIE['checkout']) || !$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['queryCheckout'] = $this->db->where('user_id',$user->id)->where('checkout',1)->order_by('cart_id','desc')->get('cart');
    $data['add'] = $this->db->where('user_id',$user->id)->order_by('address_id','desc')->get('address')->row();

    $this->load->view('include/header');
    $this->load->view('checkout',$data);
    $this->load->view('include/footer');
  }

  public function view($id)
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

    $user = $this->ion_auth->user()->row();

    $data = array(
      'user_id' => $user->id,
      'checkout' => 1,
      'sid' => $_COOKIE['checkout']
    );

    if ($this->ion_auth->logged_in()) {

      $user = $this->ion_auth->user()->row();
      $cart = $this->db->where('user_id',$user->id)->where('checkout',0)->order_by('cart_id','desc')->get('cart')->row();

      $updateCheckout = $this->db->where('user_id',$user->id)->where('cart_id',$cart->cart_id)->set($data)->update('cart');

      if ($updateCheckout) {
        $data['queryInvoice'] = $this->db->where('user_id',$user->id)->where('checkout',1)->order_by('cart_id','desc')->get('cart');
        $data['add'] = $this->db->where('user_id',$user->id)->order_by('address_id','desc')->get('address')->row();

        $cart = $data['queryInvoice']->row();

        $name = "Billing Dripsweet";
        $email = $user->email;
        $subject = "Invoice - ".$cart->invoice.' telah dibuat.';
        $message = $this->load->view('notification/invoice',$data,true);

        $this->checkout->email($email,$subject,$message,$name);
      }
    }else {
      $this->db->where('sid',$_COOKIE['cart'])->set($data)->update('cart');
    }

    delete_cookie('cart');

    redirect('checkout');
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
    $user = $this->ion_auth->user()->row();

    $data['queryInvoice'] = $this->db->where('user_id',$user->id)->where('checkout',1)->order_by('cart_id','desc')->get('cart');
    $data['add'] = $this->db->where('user_id',$user->id)->order_by('address_id','desc')->get('address')->row();

    $this->load->view('notification/invoice',$data);
  }

}
