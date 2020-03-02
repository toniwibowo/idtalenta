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

}
