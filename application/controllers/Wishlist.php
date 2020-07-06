<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['queryWishlist'] = $this->db->where('user_id', $user->id)->get('wishlist');

    $this->load->view('include/header');
    $this->load->view('wishlist',$data);
    $this->load->view('include/footer');
  }

  public function add()
  {
    if (!$this->input->is_ajax_request() || !$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $class_id = $this->input->post('mentor_class_id',true);
    $user = $this->ion_auth->user()->row();

    $check = $this->db->where('user_id', $user->id)->where('mentor_class_id',$class_id)->get('wishlist');

    if ($check->num_rows() > 0) {
      echo "exist";
    }else {
      $data = array(
        'user_id' => $user->id,
        'mentor_class_id' => $class_id
      );

      $insert = $this->db->insert('wishlist', $data);

      if ($insert) {
        echo "success";
      }
    }
  }

}
