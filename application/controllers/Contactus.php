<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contactus  extends MX_Controller {

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
        $this->config->load('sketsanet');
        $this->load->library('output_view');
        $this->load->library('pagination');
        $this->load->model('member_model', 'member');


        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];

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


        $this->load->model("M_news");

        $this->load->helper('captcha');
    }

	function index()
	{
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

	function send()
	{
		$nama             = $this->input->post('name',TRUE);
    $subject          = $this->input->post('subject',TRUE);
    $email            = $this->input->post('email',TRUE);
    $message          = $this->input->post('message',TRUE);
		$captcha          = $this->input->post('captcha',TRUE);

		$data = array(
      'nama' => $nama,
      'subject' => $subject,
      'email' => $email,
      'comment' => $message,
    );

    $insert = $this->db->insert('contact', $data);

		if($insert)
		{
				// $captcha_result = 'Contact Us Indosan';
				$text = "Name : " . $nama . "<br>";
        $text .= "Subject : " . $subject . "<br>";
        $text .= "E-mail : " . $email . "<br>";
        $text .= "Message :  <br>";
        $text .= $message;

        if ($this->member->email($email = 'yudisketsa@gmail.com',$subject,$text,$name)) {
          $this->session->set_flashdata('message', 'Your message has been sent, thanks for contacting us. Your message will be process soon');
          redirect('contact-us');
        } else {

          $this->session->set_flashdata('message', 'Your message was inserted to our database, thanks for contact us');

          redirect('contact-us');

        }


			}else {

        $this->session->set_flashdata('message', 'Your message was not sent, please try again');

        redirect('contact-us');

      }

		}

}
