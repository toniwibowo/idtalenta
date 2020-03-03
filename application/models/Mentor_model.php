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

  public function uploadPhoto($user_id, $filename, $input, $size=100, $path='./images/avatars/',$type='gif|jpg|png')
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

  public function uploadImage($filename, $input, $size=2000, $path='./images/avatars/',$type='gif|jpg|png')
  {
    $config['upload_path']      = $path;
    $config['allowed_types']    = $type;
    $config['file_name']        = $filename;
    $config['max_size']         = $size;

    $this->load->library('upload', $config);

    return $this->upload->do_upload($input);

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

}
