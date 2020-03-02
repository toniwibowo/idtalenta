<?php 

class Login extends CI_Controller{

   function __construct(){
      parent::__construct();     
        $this->load->model('m_users');

   }

   function index(){
      $this->load->view('include/header');
    $this->load->view('home');
    $this->load->view('include/footer');
   }

   function aksi_login(){
      
    
   public function logout()
   {
      $this->session->sess_destroy();

      redirect('login');
   }
 
}