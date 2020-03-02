<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{


  public function __construct()
  {
    parent::__construct();

         //   $this->load->library(array('form_validation'));
         // $this->load->helper(array('url'));
         // $this->load->model('m_account'); //call model
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['querySlider'] = $this->db->where('start_date <=', date('Y-m-d'))->where('end_date >=',date('Y-m-d'))->get('slider');
      $data['queryArticles'] = $this->db->order_by('posting_date', 'desc')->limit(3)->get('articles');
      $data['queryPartners'] = $this->db->order_by('partners_id', 'asc')->get('partners');

      $this->load->view('include/header');
      $this->load->view('home',$data);
      $this->load->view('include/footer');
  }
function register_act(){
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $kode_ref = $this->input->post('kode_ref');
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
      $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('password','Password','required');
      $this->form_validation->set_rules('kode_ref','Kode Referral','required');
      if($this->form_validation->run() != false){
          $data = array(
        'nama' => $nama,
            'email' => $email,
            'password' => md5($password),
            'kode_ref' => $kode_ref,
          );
          $this->db->insert('user', $data);
          if($data){
             echo "
        <script>alert('Registrasi berhasil. Silahkan Login');window.location='register'</script>";
          }
        }else{
          $this->load->view('include/header');
    $this->load->view('member-register');
    $this->load->view('include/footer');
        }
      }

public function ajax_list()
  {
      $list = $this->users->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {

        if($i->status == 1) {
          $status = '<a href="'.site_url('user/status/2/'.$i->id_user).'" class="btn btn-success btn-xs">Active</a>';
        } else {
          $status = '<a href="'.site_url('user/status/1/'.$i->id_user).'" class="btn btn-danger btn-xs">Non Active</a>';
        }

        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $i->fullname;
        $row[] = $i->alamat;
        $row[] = $i->telp;
        $row[] = $status;
        $row[] = '<a href="'.site_url('user/detail/'.$i->id_user).'" class="btn btn-primary btn-xs"><i class="fa fa-search-plus"></i></a>';

        $data[] = $row;
      }

      $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->users->count_all(),
                "recordsFiltered" => $this->users->count_filtered(),
                "data" => $data
            );
      //output to json format
    echo json_encode($output);
  }

  public function status()
  {
    $this->cek_login();

    if (!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)))
    {
      redirect('user');
    }

    $this->users->update('t_users', ['status' => $this->uri->segment(3)], ['id_user' => $this->uri->segment(4)]);

    redirect('user');
  }

  public function detail()
  {
    $this->cek_login();

    if (!is_numeric($this->uri->segment(3)))
    {
      redirect('user');
    }

    $data['data'] = $this->users->get_where('t_users',['id_user' => $this->uri->segment(3)]);

    $this->template->admin('admin/detail_user', $data);
  }

  function cek_login()
  {
    if (!$this->session->userdata('admin'))
    {
      redirect('login');
    }
  }

  public function register()
  {
    $this->load->helper(array('url'));
    $this->load->helper('form');
    $this->load->view('include/header');
    $this->load->view('member-register');
    $this->load->view('include/footer');
  }

 public function dashboard()
  {
    $this->load->view('include/header');
    $this->load->view('member-dashboard');
    $this->load->view('include/footer');
  }

  public function contributor()
  {
     $this->load->view('include/header');
    $this->load->view('contrbutor');
    $this->load->view('include/footer');
  }

    function logout(){

      $this->session->sess_destroy();
echo "<script>alert('Logout Berhasil');</script>";
redirect();
   }
}
