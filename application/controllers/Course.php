<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('mentor_model' => 'mentor', 'video_model' => 'video' ));
  }

  function detail($id, $slug)
  {
    $this->video->update_hits($id);

    $data['user'] = $this->ion_auth->user()->row();

    $data['classDetail'] = $this->db->where('mentor_class_id', $id)->from('mentor_class')->join('users','users.id = mentor_class.user_id')->get();

    $row = $data['classDetail']->row();

    $data['mentor'] = $this->db->where('user_id',$row->user_id)->get('mentor')->row();

    $data['videoDetail'] = $this->db->where('video_id',$row->video_id)->get('mentor_video');

    $data['queryReview'] = $this->db->where('mentor_class_id', $id) -> from('review') -> join('users','users.id = review.user_id') -> get();

    $data['classPopular'] = $this->db->order_by('hits', 'desc')->where('hits !=', 0)->limit(6,0)->get('mentor_class');

    $data['materi'] = $this->db->where('video_id', $row->video_id)->get('mentor_video');

    $this->load->view('include/header');
    $this->load->view('course-detail', $data);
    $this->load->view('include/footer');
  }

  public function view($id, $slug='')
  {
    // SEGMENT CATEGORY
    $category_slug  = ucwords(str_replace('-',' ', $this->uri->segment(2)));
    $category_id    = $this->db->where('category_product_name', $category_slug)->get('category_product')->row()->category_product_id;

    // SEGMENT SUBCATEGORY
    $uri3 = $this->uri->segment(3);
    $subcategory_slug  = ucwords(str_replace('-',' ', $uri3));
    $sub    = $this->db->where('name', $subcategory_slug)->get('subcategory_product')->row();

    $data['title'] = 'Category Course';

    if ($uri3 != '') {
      $subcategory_slug  = ucwords(str_replace('-',' ', $this->uri->segment(3)));

      $data['category_title'] = $subcategory_slug;

      $sql =
      "SELECT *
      FROM mentor_class a
      INNER JOIN category_product b
      ON a.category_product_id = b.category_product_id
      INNER JOIN subcategory_product c
      ON a.subcategory_product_id = c.subcategory_product_id
      WHERE a.category_product_id = $sub->subcategory_product_id";

    }else {

      $data['category_title'] = $category_slug;

      $sql = "SELECT * FROM mentor_class a INNER JOIN category_product b ON a.category_product_id = b.category_product_id WHERE a.category_product_id = $category_id";

    }




    $data['queryCategory'] = $this->db->query($sql);

    $this->load->view('include/header');
    $this->load->view('course-category', $data);
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
