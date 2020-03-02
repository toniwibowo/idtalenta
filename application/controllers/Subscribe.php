<?php
  if(!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Subscribe extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
    }



    public function sendEmail()
    {
      $email = $this->input->post('newsletterEmail',true);

      if (trim($email) == '') {
        echo 3;
      }else {

        //CEK EMAIL

        $cekEmail = $this->db->where('email',$email)->get('subscribe');

        if ($cekEmail->num_rows() > 0) {
          echo 2;
        }else {
          $data = array('email' => $email);
          $insertEmail = $this->db->insert('subscribe',$data);

          if ($insertEmail) {
            echo 1;
          }else {
            echo 0;
          }
        }
      }




    }

    //     function index(){
    //     $email = $this->input->post("email");
    //         header('Content-Type: application/x-json; charset=utf-8');
    //         $this->db->set('email',"$email");
    //         $this->db->insert('subscribe');
    //         $insert = $this->db->insert_id();
    //         echo(json_encode($insert));
    //     }
    // public function add_new(){
    //         $email = $this->input->post("email");
    //         header('Content-Type: application/x-json; charset=utf-8');
    //         $this->db->set('email',"$email");
    //         $this->db->insert('subscribe');
    //         $insert = $this->db->insert_id();
    //         echo(json_encode($insert));
    //     }


  }
