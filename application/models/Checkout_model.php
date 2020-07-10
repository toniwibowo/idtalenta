<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllOrders()
  {
    return $this->db->get('orders');
  }

  public function email($email,$subject,$message,$name)
  {

    $this->config->load('sketsanet');
    $config = $this->config->item('email');

    require_once(APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer();

    $auth = true;

    if ($auth)
    {
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = $config['smtp_host'];
        $mail->Port = 465;
        $mail->Username = $config['smtp_user'];
        $mail->Password = $config['smtp_pass'];

        //$mail->Debugoutput = 'html';
        //$mail->SMTPDebug = 2;

    }

    $mail->AddAddress($email);
    $mail->AddBCC('tonny.wbw84@gmail.com');
    $mail->SetFrom("admin@idtalenta.com", "no-reply");

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->Send()) {

      return false;

    }else {

      $config['protocol']   = 'smtp';
      $config['smtp_host']  = $config['smtp_host'];
      $config['smtp_user']  = $config['smtp_user'];
      $config['smtp_pass']  = $config['smtp_pass'];
      $config['smtp_port']  = 465;
      $config['mailtype']   = 'html';
      $config['newline']    = "\r\n";

      $this->load->library('email', $config);

      $this->email->from('no-reply@idtalenta.com', $name);
      $this->email->to($email);
      $this->email->set_mailtype("html");
      //$this->email->cc('another@another-example.com');
      $this->email->bcc('yudisketsa@gmail.com');
      $this->email->bcc('tonny.wbw84@gmail.com');

      $this->email->subject($subject);
      $this->email->message($message);

      $this->email->send();

      return false;

    }

  }

  public function notif_purchase_mentor($class_id, $sid)
  {
    $data = [
      'queryInvoice' => $this->db->where('sid', $sid)->order_by('order_id','desc')->get('orders'),
      'user' => $this->ion_auth->user()->row(),
      'mentorClass' => $this->db->where('mentor_class_id', $class_id)->from('mentor_class')->join('users','users.id=mentor_class.user_id')->get()->row()
    ];

    $kelas = $data['mentorClass'];

    $email = $kelas->email;
    $name = "Billing ARTademi";
    $subject = "Hai ".$kelas->full_name." kelas anda dengan #ID".$kelas->mentor_class_id.$kelas->user_id." telah dipesan";
    $message = $this->load->view('notification/mentor-purchased',$data,true);

    //return $this->load->view('notification/mentor-purchased',$data);

    $this->email($email,$subject,$message,$name);

    return true;

  }

}
