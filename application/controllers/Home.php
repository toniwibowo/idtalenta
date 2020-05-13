<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 *
 * @version 3.8.2
 *
 * @author : Arief Budiyono
 */
class Home extends MX_Controller
{


	 // Site
    private $title;
    private $logo;

    // Template
    private $admin_template;
    private $front_template;
    private $auth_template;
    private $youtubeanak_template;

    // Auth view
    private $login_view;
    private $register_view;
    private $forgot_password_view;
    private $reset_password_view;

    // Default page
    private $default_page;
    private $login_success;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->model("M_blog");

        if (!isset($_COOKIE['cart'])) {
    			$sid = session_id().date('His');
    			//setcookie('cart', $sid, time() + (86400 * 14), "/"); // 86400 = 1 day
          setcookie('cart', $sid, time() + (86400 * 3), "/"); // 86400 = 1 day
    		}

    //     if($this->session->userdata('status') != "login"){
    //   redirect(base_url("login"));
    // }

        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library('pagination');


        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];
        $this->plugkreasi_home_template = $template['home'];

        // Auth view
        $view = $this->config->item('view');
        $this->login_view = $view['login'];
        $this->register_view = $view['register'];
        $this->forgot_password_view = $view['forgot_password'];
        $this->reset_password_view = $view['reset_password'];

        // Default page
        $route = $this->config->item('route');
        $this->default_page = $route['default_page'];
        $this->login_success = $route['login_success'];

         $this->load->helper('captcha');
    }


     /**
     * Default page.
     *
     * @return HTML
     **/
    public function index()
    {

    //$data['name'] = "";
    //$data['email']  ='';
    //$data['comment']= '';
    //$data['captcha'] = "";
    //$data['cap_img'] = $this -> _make_captcha();
    //$data['cap_msg'] = "";
    //$this->load->view('contact-us',$data);
    //$this->session->set_userdata('site_lang', 'id');
    if(empty($this->session->userdata('site_lang')))
    {
      $this->session->set_userdata('site_lang', 'id');
    }
     // echo $this->session->userdata('site_lang');


    	//$data = array();
	     //$data['site_lang'] = !empty($this->session->userdata('site_lang'))?$this->session->userdata('site_lang'):'en';

       //echo $data['site_lang'] ;

		  //$this->output_view->set_wrapper('page', 'home_video', $data);
     	//$template = $this->plugkreasi_home_template;
      //$this->output_view->output($template);

      $data['querySlider']    = $this->db->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->get('slider');

      $data['queryBanner']    = $this->db->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->limit(3)->get('banner');

      $data['queryCategory']  = $this->db->order_by('category_product_id', 'asc')->get('category_product');

      $data['queryCourse']    = $this->db->order_by('mentor_class_id', 'desc')->limit(8)->get('mentor_class');

      $data['queryTopSale']   = $this->db->order_by('hits', 'desc')->limit(8)->get('mentor_class');

      $data['queryArticles']  = $this->db->order_by('posting_date', 'desc')->limit(3)->get('articles');

      $data['queryMentor']    = $this->db->where('mentor.active',1)->order_by('mentor.mentor_id', 'desc')->select('mentor.*,mentor.mentor_id as id_mentor, users.*')->from('mentor')->join('users','users.id = mentor.user_id')->get();
      $data['queryPartners']  = $this->db->order_by('partners_id', 'asc')->get('partners');

      $data['queryPromo'] = $this->db->where('start_date <=', date('Y-m-d'))->where('end_date >=', date('Y-m-d'))->from('mentor_promo')->join('mentor_class','mentor_class.mentor_class_id=mentor_promo.mentor_class_id')->get();

      $this->load->view('include/header');
      $this->load->view('home',$data);
      $this->load->view('include/footer');

    }

    public function ajax_category()
    {
      if (!$this->input->is_ajax_request()) {
        redirect('/');
      }
    }




    function send(){

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('subject', 'Subject', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
    //$this->form_validation->set_rules('budget', 'Budget', 'required');
    // $this->form_validation->set_rules('jadwal_showing', 'Jadwal Showing', 'required');
    // $this->form_validation->set_rules('Jadwal Movin', 'Jadwal Movin', 'required');
    $this->form_validation->set_rules('comment', 'comment', 'required');
    //$this->form_validation->set_rules('captcha', 'Captcha', 'required');

    $nama             = $this->input->post('name',TRUE);
     $subject           = $this->input->post('subject',TRUE);
    // $budget          = $this->input->post('budget',TRUE);
    // $harapan_area        = $this->input->post('harapan_area',TRUE);
    // $nama_apartemen        = $this->input->post('nama_apartemen',TRUE);
    // $nama_perusahaan       = $this->input->post('nama_perusahaan',TRUE);
    $email            = $this->input->post('email',TRUE);
    // $jadwal_showing      = $this->input->post('jadwal_showing',TRUE);
    // $jadwal_movin        = $this->input->post('jadwal_movin',TRUE);
    // $perkiraan_include_pajak = $this->input->post('perkiraan_include_pajak',TRUE);
    // $alamat_kantor       = $this->input->post('alamat_kantor',TRUE);
    // $keinginan_lain        = $this->input->post('keinginan_lain',TRUE);
    $comment          = $this->input->post('comment',TRUE);
    //$captcha  = $this->input->post('captcha',TRUE);

    if($this->form_validation->run() == FALSE){
      $data['cap_img'] = $this -> _make_captcha();
      $data['cap_msg'] = "";
      $this->load->view('home',$data);
    }else {

      //if ( $this -> _check_capthca($captcha) ){

        $data = array(
                  'nama' => $nama,
                  'subject' => $subject,

                  'email' => $email,

                  'comment' => $comment,

      );

      $insert = $this->db->insert('contact', $data);


        if($insert){

          $captcha_result = 'Contact Us Indosan';

          $text = "Name : " . $nama . "<br>";
          $text .= "Subject : " . $subject . "<br>";
          $text .= "E-mail : " . $email . "<br>";
          //$text .= "Nama Perusahaan : " . $nama_perusahaan . "<br>";
          $text .= "Comment :  <br>";
          $text .= $comment;

          /*
          $this->load->library('PHPMailerAutoload');

          $mail = new phpmailer();
          # Principal settings

          // $mail->SMTPOptions = array(
          // 'ssl' => array(
          // 'verify_peer' => false,
          // 'verify_peer_name' => false,
          // 'allow_self_signed' => true
          // )
          // );

          $mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = "mail.indosan.com";
$mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = "admin@indosan.com";  // SMTP username
        $mail->Password = "f;iMyuVRb}&g"; //
$mail->SMTPSecure = 'none'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to
$mail->SMTPAutoTLS = false;
//$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
//$mail->Hostname = “nama-hostname”;

$mail->From     = $email;
				$mail->FromName = $nama;

          //$mail->AddAddress("yudi@sketsa.net","Yudi");
        //  $mail->AddAddress("haru.wyndham@gmail.com","Haru");
          $mail->AddAddress("hey_abud@yahoo.com");
          //$mail->AddBCC("yudisketsa@gmail.com");



          $mail->IsHTML(true); // send as HTML
          # Embed images
          //$mail->AddEmbeddedImage('img/mailings/logo.gif', "logo_header");

          $mail->Subject = $subject;
          //$mail->Body = $this->load->view('email/mailing_view','',TRUE);
          $mail->Body       = $text;
          //$mail->AltBody = "This is the text-only body";
          */

          $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
        $headers .= 'To: arief <klayabancom@gmail.com>' . "\r\n";
$headers .= 'From: '.$nama.' <'.$email.'>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
$headers .= 'Bcc: hey_abud@yahoo.com' . "\r\n";


        $subject = 'Contact to INDOSAN';

  //$headers = 'From: BIOR <noreply@bior.com>'."\r\n".'Content-Type: text/html; charset=UTF-8';#FOR TEST

  $sending = mail('admin@indosan.com', $subject, $text, $headers);

        //if(!$mail->Send())
        if(!$sending)
        {
          echo "Message was not sent <br>";
          //echo "Mailer Error: " . $mail->ErrorInfo;
          exit;
        }
        else {
          echo "<script language='javascript'>alert('Thank you for your attention');</script>";
          ?><meta http-equiv='refresh' content='0;URL=<?php echo site_url('home'); ?>'><?php
        }


        }
      // }else{
      //  $captcha_result = 'Security Code Invalid';
      // }

      $data['name'] = $nama;
      //$data['phone'] = $phone;
      $data['email'] = $email;
      $data['subject'] = $subject;
      $data['comment'] = $comment;
      $data['captcha'] = $comment;
      $data['cap_img'] = $this -> _make_captcha();
      $data['cap_msg'] = $captcha_result;
      //$this->load->view('contact-us',$data);
$this->load->view('home',$data);

    }


  }




     /**
     * Custom page backend.
     *
     * @return HTML
     **/
    public function page($slug)
    {

    }





  function _make_captcha()
    {
      //$this -> load -> plugin( 'captcha' );
      $vals = array(
        'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
        'img_url' => base_url() . 'captcha/', // URL for captcha img
        'img_width' => 160, // width
        'img_height' => 60, // height
        'font_path'     => './system/fonts/comic.ttf',
        'expiration' => 3600 ,
        );
      // Create captcha
      //$cap = create_captcha( $vals );
      // Write to DB
      if ( $cap ) {
        $data = array(
          //'captcha_id' => '',
          'captcha_time' => $cap['time'],
          'ip_address' => $this -> input -> ip_address(),
          'word' => $cap['word'] ,
          );
        $query = $this -> db -> insert_string( 'captcha', $data );
        $this -> db -> query( $query );
      }else {
        return "Umm captcha not work" ;
      }
      return $cap['image'] ;
    }

    function _check_capthca()
    {
      // Delete old data ( 2hours)
      $expiration = time()-3600 ;
      $sql = " DELETE FROM captcha WHERE captcha_time < ? ";
      $binds = array($expiration);
      $query = $this->db->query($sql, $binds);

      //checking input
      $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
      $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
      $query = $this->db->query($sql, $binds);
      $row = $query->row();

    if ( $row -> count > 0 )
      {
        return true;
      }
      return false;

    }

public function contact(){
  $data['name'] = "";
    $data['address'] = "";
    $data['phone'] = "";
    $data['email'] = "";
    $data['message'] = "";
    // $data['cap_img'] = $this -> _make_captcha();
    $data['cap_msg'] = "";
    $this->load->view('include/header');
    $this->load->view('contactus',$data);
    $this->load->view('include/footer');
}
public function mentor(){
   $this->load->view('include/header');
    $this->load->view('menu');
    $this->load->view('include/footer');
}
 public function view(){
    $data = $this->M_blog->viewjoin();
    $this->load->view('blog',$data);
  }

public function video_detail()
  {
    $this->load->view('include/header');
    $this->load->view('video-detail');
    $this->load->view('include/footer');
  }

  public function dashboard()
  {
    $this->load->view('include/header');
    $this->load->view('member-dashboard');
    $this->load->view('include/footer');
  }

public function detail()
  {
    $this->load->view('include/header');
    $this->load->view('mentor-detail');
    $this->load->view('include/footer');
  }

public function login()
{
   $email = $this->input->post('email');
      $password = $this->input->post('password');
      $where = array(
         'email' => $email,
         'password' => md5($password)
         );
      $cek = $this->m_users->cek_login("user",$where)->num_rows();
      if($cek > 0){

         $data_session = array(
            'nama' => $email,
            'status' => "login"
            );

         $this->session->set_userdata($data_session);

        if($data_session){
             echo "
        <script>alert('Berhasil Login');window.location='dashboard'</script>";
          }

      }else{
         echo "
        <script type='text/javascript'>
        alert('Email dan Password Anda Salah!');
        history.back(self);
        </script>";
      }
}
public function contributor()
  {

          $this->load->view('include/header');
    $this->load->view('contributor');
    $this->load->view('include/footer');
        }

        public function update()
  {

          $this->load->view('include/header');
    $this->load->view('update');
    $this->load->view('include/footer');
        }


public function logout()
  {

    $this->session->sess_destroy();
    redirect('');

  }
    function test()
    {
      phpinfo();
    }

}
