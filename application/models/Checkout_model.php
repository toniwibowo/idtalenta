<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function email($email,$subject,$message,$name)
  {
    $config['protocol']   = 'smtp';
    $config['smtp_host']  = 'mail.gravenza.com';
    $config['smtp_user']  = 'info@gravenza.com';
    $config['smtp_pass']  = 'gravenza2015';
    $config['smtp_port']  = 465;
    $config['mailtype']   = 'html';
    $config['newline']    = "\r\n";

    $this->load->library('email', $config);

    $this->email->from('support@dripsweet.com', $name);
    $this->email->to($email);
    $this->email->set_mailtype("html");
    //$this->email->cc('another@another-example.com');
    $this->email->bcc('tonny.wbw84@gmail.com');

    $this->email->subject($subject);
    $this->email->message($message);

    $this->email->send();

    return false;

  }

}
