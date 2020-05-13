<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function view($slug='')
  {
    $this->load->view('include/header');
    //$this->load->view('course', $data);
    echo '<h1>PAGE CATEGORY</h1>';
    $this->load->view('include/footer');
  }

  public function lecture($sid, $id, $slug)
  {
    $checkOrder = $this->db->where('sid', $sid)->get('orders')->row();

    $user = $this->ion_auth->user()->row();

    if (!$this->ion_auth->logged_in() || $user->id != $checkOrder->user_id) {
      redirect('/');
    }

    $data['row'] = $this->db->where('order_id', $checkOrder->order_id)->where('product_id',$id)->from('order_item')->join('mentor_class','mentor_class.mentor_class_id=order_item.product_id')->get()->row_array();

    $data['list_video'] = $this->db->where('video_id', $data['row']['video_id'])->get('mentor_video');

    $data['list_materi'] = $this->db->where('video_id', $data['row']['video_id'])->get('mentor_materi');

    $this->load->view('include/header');
    $this->load->view('course', $data);
    $this->load->view('include/footer');
  }

}
