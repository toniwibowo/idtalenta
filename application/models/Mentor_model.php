<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function deletethriller($id)
  {
    $row = $this->db->where('mentor_class_id', $id)->get('mentor_class')->row();

    unlink('./assets/uploads/videos/'.$row->thriller);

    return $this->db->where('mentor_class_id',$id)->set('thriller','')->update('mentor_class');
  }

  public function uploadPhoto($user_id, $filename, $input, $size=100, $path='./assets/uploads/files/',$type='gif|jpg|png')
  {
    $config['upload_path']      = $path;
    $config['allowed_types']    = $type;
    $config['file_name']        = $filename;
    $config['max_size']         = $size;
    //$config['max_width']        = 1024;
    //$config['max_height']       = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload($input)) {

      $dataPhoto = array(
        'photo' => $filename
      );

      $this->db->where('id', $user_id)->set($dataPhoto)->update('users');

      return "uploaded";
    }else {

      $error = array('error' => $this->upload->display_errors());

      return $error['error'];
    }

  }

  public function uploadFile($filename, $input, $size=2000, $path='./images/avatars/',$type='gif|jpg|png')
  {
    $config['upload_path']      = $path;
    $config['allowed_types']    = $type;
    $config['file_name']        = $filename;
    $config['max_size']         = $size;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload($input)) {

      return true;

    }else {

      return false;
    }


  }

  public function uploadPoster($filename, $input, $size=2000, $path='./images/avatars/',$type='gif|jpg|png')
  {
    $config['upload_path']      = $path;
    $config['allowed_types']    = $type;
    $config['file_name']        = $filename;
    $config['max_size']         = $size;

    $this->load->library('upload', $config);

    return $this->upload->do_upload($input);

  }

  public function multiple_upload($name, $data)
  {
    $files  = $_FILES[$name]['name'];
    $user   = $this->ion_auth->user()->row();
    $message = array();

    foreach ($files as $key => $value) {
      $file_name  = $_FILES[$name]['name'][$key];
      $filename   = random_string('alnum',5).'-'.str_replace(' ','-',$file_name);
      $tmp_name   = $_FILES[$name]['tmp_name'][$key];

      $makediruser = './assets/uploads/materi/'.$user->id;
      $makedirdate = './assets/uploads/materi/'.$user->id.'/'.date('dmY');

      if (!is_dir($makediruser)) {
        mkdir($makediruser);

        if (!is_dir($makedirdate)) {
          mkdir($makedirdate);
        }

      }

      $directory = $makedirdate.'/';

      $EXT = pathinfo($filename, PATHINFO_EXTENSION);


      if ($EXT == 'jpg' || $EXT == 'jpeg' || $EXT == 'png' || $EXT == 'gif') {
        if ($_FILES[$name]['size'][$key] <= 30000) {
          if (move_uploaded_file($tmp_name,$directory.$filename)) {
            $datamateri = array('materi_name' => $filename);
            $insertData = array_merge($data, $datamateri );
            $this->db->insert('mentor_materi', $insertData);

            $message[$key] = "File ".$filename." sukses diupload";
          }else {
            $message[$key] = "File ".$filename." gagal diupload";
          }
        }else {
          $message[$key] = "File ".$filename." gagal diupload, ukuranya terlalu besar";
        }
      }else {
        $message[$key] = "Tipe file ".$filename." tidak diizinkan";
      }

      $message['images'][$key] = $filename;

      //$message .='Data yang saya upload adalah <br />';
      //$message .= $filename. '<br />';

      // if ($this->upload->do_upload($name)) {
      //   $message[] = "Success";
      // }else {
      //   $message[] = array('error' => $this->upload->display_errors());
      // }

    }

    return $message;
  }

  public function star($id)
  {
    $star5  = $this -> db -> where('mentor_class_id',$id) -> where('star',5.00) -> get('review') -> num_rows();
    $star45 = $this -> db -> where('mentor_class_id',$id) -> where('star',4.50) -> get('review') -> num_rows();
    $star4  = $this -> db -> where('mentor_class_id',$id) -> where('star',4.00) -> get('review') -> num_rows();
    $star35 = $this -> db -> where('mentor_class_id',$id) -> where('star',3.50) -> get('review') -> num_rows();
    $star3  = $this -> db -> where('mentor_class_id',$id) -> where('star',3.00) -> get('review') -> num_rows();
    $star25 = $this -> db -> where('mentor_class_id',$id) -> where('star',2.50) -> get('review') -> num_rows();
    $star2  = $this -> db -> where('mentor_class_id',$id) -> where('star',2.00) -> get('review') -> num_rows();
    $star15 = $this -> db -> where('mentor_class_id',$id) -> where('star',1.50) -> get('review') -> num_rows();
    $star1  = $this -> db -> where('mentor_class_id',$id) -> where('star',1.00) -> get('review') -> num_rows();

    $multipleStar5 = ($star5 * 5);
    $multipleStar45 = ($star45 * 4.50);
    $multipleStar4 = ($star4 * 4);
    $multipleStar35 = ($star35 * 3.50);
    $multipleStar3 = ($star3 * 3);
    $multipleStar25 = ($star25 * 2.50);
    $multipleStar2 = ($star2 * 2);
    $multipleStar15 = ($star15 * 1.50);
    $multipleStar1 = ($star1 * 1);

    $allStar = $multipleStar5 + $multipleStar45 + $multipleStar4 + $multipleStar35 + $multipleStar3 + $multipleStar25 + $multipleStar2 + $multipleStar15 + $multipleStar1;

    $amountstar = $star5 + $star45 + $star4 + $star35 + $star3 + $star25 + $star2 + $star15 + $star1;

    if ($allStar == 0 || $amountstar == 0) {

      return false;

    }else {

      $review = $allStar / $amountstar;

      return $review;

    }


  }

  public function check_review($id,$class_id)
  {
    $checkReview = $this->db->where('user_id', $id) -> where('mentor_class_id',$class_id)->get('review');

    if ($checkReview->num_rows() > 0) {
      return false;
    }else {
      return true;
    }
  }

  public function get_class_by_user($user)
  {
    return $this->db->where('user_id', $user)->where('approve', 1)->get('mentor_class');
  }

  public function video_puchased_by_id($id)
  {
    $purchased = array();
    $getVideo = $this->db->where('product_id', $id)->get('order_item');

    if ($getVideo->num_rows() > 0) {
      foreach ($getVideo->result() as $key => $value) {
        $checkPayment = $this->db->where('order_id', $value->order_id)->get('orders')->row_array();

        if ($checkPayment['payment'] == 0) { //SAAT PRODUCTION PARAMETER DIRUBAH JADI 1
          $purchased[] = $value->product_id;
        }
      }
    }

    return count($purchased);
  }

  public function total_video_purchased($user)
  {
    $purchased = array();
    $orders = $this->db->where('user_id', $user)->where('payment', 0)->get('orders');

    if ($orders->num_rows() > 0) {
      foreach ($orders->result_array() as $key => $value) {

        $getItem = $this->db->where('order_id', $value['order_id'])->get('order_item');

        foreach ($getItem->result_array() as $key => $val) {
          $purchased[] = $val['product_id'];
        }
      }
    }

    return count($purchased);


  }

  public function total_view($user_id)
  {
    return $this->db->select('*, SUM(hits) as amountHits')->where('user_id', $user_id)->get('mentor_class');
  }

}
