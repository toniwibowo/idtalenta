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

  public function lecture($id,$slug)
  {
    $this->load->view('include/header');
    $this->load->view('course');
    $this->load->view('include/footer');
  }

}
