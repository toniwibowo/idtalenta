<?php 

class Login extends CI_Controller{

   function __construct(){
      parent::__construct();     
        $this->load->model('m_users');

   }

   function index(){
      $this->load->view('include/header');
    $this->load->view('contrbutor');
    $this->load->view('include/footer');
   }
}