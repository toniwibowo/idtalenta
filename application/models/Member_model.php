<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->helper('cookie');
    $this->config->load('sketsanet');
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

      return true;

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
      //$this->email->bcc('yudisketsa@gmail.com');
      $this->email->bcc('tonny.wbw84@gmail.com');

      $this->email->subject($subject);
      $this->email->message($message);

      if ($this->email->send()) {
        return true;
      }else {
        return false;
      }

    }

  }

  public function province($province_id = '')
  {
    if ($province_id == '') {
      $url = "https://api.rajaongkir.com/starter/province";
    }else {
      $url = "https://api.rajaongkir.com/starter/province?id=".$province_id;
    }
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('key: e4fc80495fec47c0d8990e58b6c98273'));

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output,true);
  }

  public function state($id = '', $province_id = '')
  {
    if ($id == '' && $province_id == '') {
      $url = "https://api.rajaongkir.com/starter/city";
    }else {
      $url = "https://api.rajaongkir.com/starter/city?id=".$id."&province=".$province_id;
    }
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('key: e4fc80495fec47c0d8990e58b6c98273'));

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output,true);
  }

  public function update_usercheckout()
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

    $this->db->where('sid',$_COOKIE['cart'])->set($data)->update('cart');

    delete_cookie('cart');
  }

  public function updateaddress_afterlogin($user_id)
  {
    $dataUser = array(
      'user_id' => $user_id
    );

    $this->db->where('sid',$_COOKIE['cart'])->set($dataUser)->update('address');

    $cekAddres = $this->db->where('user_id',$user_id)->get('address');

    if ($cekAddres->num_rows() > 1) {
      $getAddress = $this->db->order_by('address_id','desc')->where('user_id',$user_id)->get('address')->row();
      // DELETE OLD ADDRESS
      $this->db->where('user_id',$user_id)->where('address_id <',$getAddress->address_id)->delete('address');
    }
  }

  public function updatecart_afterlogin($user_id)
  {
    $dataUser = array(
      'user_id' => $user_id
    );

    $this->db->where('sid',$_COOKIE['cart'])->set($dataUser)->update('cart');

  }

  public function validate_phone($phone)
  {
    $status = false;

    if (substr($phone,0,2) == '62') {
      $phonefilter = trim($phone,'62');
    }else {
      $phonefilter = trim($phone,'0');
    }

    $phone1 = '0'.$phonefilter;
    $phone2 = '62'.$phonefilter;

    $cekphone = $this->db->where('phone',$phone1)->or_where('phone',$phone2)->get('users');

    if ($cekphone->num_rows() > 0) {
      $status = true;

      return $status;
    }else {
      $status = false;

      return $status;
    }
  }

}
