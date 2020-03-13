<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mentor_model','mentor');
  }

  function view($id,$slug)
  {
    $data = [
      'mentorClass' => $this->db->where('category_product_id', $id)->get('mentor_class')
    ];

    $this->load->view('include/header');
    $this->load->view('video',$data);
    $this->load->view('include/footer');
  }

  public function detail($id, $slug)
  {

    $data['classDetail'] = $this->db->where('mentor_class_id', $id)->from('mentor_class')->join('users','users.id = mentor_class.user_id')->get();

    $row = $data['classDetail']->row();

    $data['mentor'] = $this->db->where('user_id',$row->user_id)->get('mentor')->row();

    $data['videoDetail'] = $this->db->where('video_id',$row->video_id)->get('mentor_video');

    $data['queryReview'] = $this->db->where('mentor_class_id', $id) -> from('review') -> join('users','users.id = review.user_id') -> get();

    $this->load->view('include/header');
    $this->load->view('video-detail', $data);
    $this->load->view('include/footer');
  }


}
