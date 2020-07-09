<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('member_model','member');
    $this->load->helper(array('cookie','string'));
    $this->load->library('encryption');
  }

  function register()
  {
    if ($this->ion_auth->logged_in()) {
      //redirect('/');
    }

    $this->load->view('include/header');
    $this->load->view('member-register');
    $this->load->view('include/footer');
  }

  public function subcategory($value='')
  {
    if(!$this->input->is_ajax_request()){
      redirect('/');
    }

    $sub = $this->db->where('category_product_id', $value)->get('subcategory_product');

    if ($sub->num_rows() > 0) {
      echo '<option value="" class="text-danger">==Pilih Subkategori==</option>';
      foreach ($sub->result_array() as $key => $row) {
        echo '<option value="'.$row['subcategory_product_id'].'">'.$row['name'].'</option>';
      }
    }

  }

  public function validate($slug)
  {

    $decrypt = base64_decode($slug);

    $email = hex2bin($decrypt);

    $cekEmail = $this->db->where('email',$email)->get('users');

    if ($cekEmail->num_rows() > 0) {
      $validate = $this->db->where('email',$email)->set('active',1)->update('users');

      if ($validate) {
        $this->session->set_flashdata('validate',true);
      }

      redirect('/');

    }else {

      $id = random_string('alnum',4);

      $emailto = 'toniewibowo@gmail.com';
      $subject = 'Report Email Validation - '.$id;
      $message = 'data encrypt tidak berhasil: '.$slug;
      $name = 'no-reply';

      $this->member->email($emailto,$subject,$message,$name);
    }

  }

  public function dashboard()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $data['user'] = $this->ion_auth->user()->row();

    $data['videoLatestView'] = $this->db->where('ip_address', $this->input->ip_address())->or_where('log_class_view.user_id', $data['user']->id)->from('log_class_view')->join('mentor_class', 'mentor_class.mentor_class_id = log_class_view.mentor_class_id')->get();

    $this->load->view('include/header');
    $this->load->view('member-dashboard',$data);
    $this->load->view('include/footer');
  }

  public function myaccount()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['queryProvince'] = $this->member->province();
    //$data['queryAddress'] = $this->db->where('user_id',$user->id)->get('address');

    $this->load->view('include/header');
    $this->load->view('my-account',$data);
    $this->load->view('include/footer');
  }

  public function login()
  {
    $this->load->view('include/header');
    $this->load->view('member-login');
    $this->load->view('include/footer');
  }

  public function dologin()
  {

    //$this->form_validation->set_rules('identity', 'Email or Username', 'required');
    //$this->form_validation->set_rules('passwordlogin', 'Password', 'required');

    if (isset($_POST['remember'])) {
      $remember = TRUE;
    }else {
      $remember = FALSE;
    }

    $identity  = $this->input->post('identity',true);
    $password   = $this->input->post('password',true);

    $login = $this->ion_auth->login($identity, $password, $remember);

    if (! $login) {

      $this->ion_auth_model->identity_column = 'username';

      $login = $this->ion_auth->login($identity, $password, $remember);

      //$this->session->set_flashdata('login gagal','Tidak bisa login, username atau password anda salah');

    }

    if ($login) {

      if ($_COOKIE['cart'] != null) {

        $user = $this -> ion_auth -> user() -> row();

        $this -> db -> where('sid', $_COOKIE['cart']) -> set('user_id', $user->id) -> update('cart');
      }

      echo 1;
    }else {
      echo 0;
    }

  }

  public function doregister()
  {

    // $this->form_validation->set_rules('firstname', 'First Name', 'required');
    // $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    // $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
    // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
    // $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|callback_phone_check');


    $firstname    = $this->input->post('firstname',true);
    $lastname     = $this->input->post('lastname',true);
    $phone        = $this->input->post('phone',true);

    $fullname     = $this->input->post('full_name',true);
    $email        = $this->input->post('identity',true);
    $password     = $this->input->post('password',true);
    $referalcode  = strtoupper(random_string('alnum',10));
    $ipaddress    = $this->input->ip_address();
    $group        = array('2');

    if (isset($_POST['terms'])) {
      $terms = 'YES';
    }else {
      $terms = 'NO';
    }

    $username = random_string('alnum',8);

    $additional_data = array(
      'ip_address' => $ipaddress,
      'member_id' => 2,
      'full_name' => $fullname,
      'referal_code' => $referalcode,
      'terms' => $terms
    );

    $insertuser = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

    if ($insertuser) {

      $subject = 'Hai '.$fullname.' Registrasi anda Berhasil';
      $emaildata['name'] = $fullname;
      $emaildata['email'] = base64_encode(bin2hex($email));
      $message = $this->load->view('notification/registration',$emaildata,true);
      // $this->member->email($email,$subject,$message,$name="Info IDTALENTA");

      echo 1;

    }else {

      echo 2;

    }

  }

  public function test_email($value='')
  {
    $this->config->load('sketsanet');
    $config = $this->config->item('email');

    $fullname = 'Toni Wibowo';
    $email = 'toniewibowo@gmail.com';

    $subject = 'Hai '.$fullname.' Registrasi anda Berhasil';
    $emaildata['name'] = $fullname;
    $emaildata['email'] = base64_encode(bin2hex($email));
    $message = $this->load->view('notification/registration',$emaildata,true);

    require_once(APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer();

    $auth = true;

    if ($auth)
    {
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = $config['smtp_host'];
        $mail->Port = 465;
        $mail->Username = $config['smtp_user'];
        $mail->Password = $config['smtp_pass'];

        //$mail->Debugoutput = 'html';
        //$mail->SMTPDebug = 2;

    }

    $mail->AddAddress('toniewibowo@gmail.com');
    $mail->AddBCC('tonny.wbw84@gmail.com');
    $mail->SetFrom("admin@idtalenta.com", "no-reply");

    $mail->isHTML(true);
    $mail->Subject = 'Registration New Member @ KMN STORE ';
    $mail->Body = $message;

    if ($mail->Send();) {
      echo "PESAN TERKIRIM";
    }else {
      echo "PESAN TIDAK TERKIRIM";
    }

    // $this->member->email($email,$subject,$message,$name="Info IDTALENTA");
  }

  public function update()
  {

    $firstname = $this->input->post('firstname',true);
    $lastname = $this->input->post('lastname',true);
    $address = $this->input->post('address',true);
    $province = $this->input->post('province',true);
    $city = $this->input->post('city',true);
    $postalcode = $this->input->post('postal-code',true);
    $password = $this->input->post('password',true);
    $cpassword = $this->input->post('cpassword',true);
    $user_id = $this->input->post('user_id',true);

    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    //$this->form_validation->set_rules('address', 'Address', 'trim|required');
    //$this->form_validation->set_rules('province', 'Province', 'trim|required');
    //$this->form_validation->set_rules('city', 'City', 'trim|required');
    //$this->form_validation->set_rules('postal_code', 'Postal Code', 'trim|required');

      if (isset($password)) {
        $data = array(
          'first_name' => $firstname,
          'last_name' => $lastname,
          'province_id' => $province,
          'city_id' => $city,
          'address' => $address,
          'postal_code' => $postalcode,
          'password' => $password
        );
      }else {
        $data = array(
          'first_name' => $firstname,
          'last_name' => $lastname,
          'province_id' => $province,
          'city_id' => $city,
          'address' => $address,
          'postal_code' => $postalcode
        );
      }

      $update = $this->ion_auth->update($user_id,$data);

      if ($update) {
        $this->session->set_flashdata('alert-update','Your profile was successfully update');
        redirect('member/myaccount');
      }else {
        $this->session->set_flashdata('alert-update','Your profile failed to update');
        redirect('member/myaccount');
      }


  }

  public function email_test($value='')
  {
    $email = 'toniewibowo@gmail.com';
    $subject = 'Test Email';
    $message = 'message email';

    $this->member->email($email,$subject,$message,$name='Info IDTALENTA');
  }

  public function matches_password_check($cpassword, $password)
  {
    if ($cpassword != $password) {
      $this->form_validation->set_message('matches_password_check', 'The confirmation '.$cpassword.' password field doesn\'t match with password '.$password);
      return FALSE;
    }else {
      return TRUE;
    }
  }

  public function email_check($email)
  {
    if ($this->ion_auth->email_check($email)) {
      $this->form_validation->set_message('email_check', 'The {field} field can\'t use this email. '.$email.' is already exist');
      return FALSE;
    }else {
      return TRUE;
    }
  }

  public function phone_check($phone)
  {
    if ($this->member->validate_phone($phone)) {
      $this->form_validation->set_message('phone_check', 'The {field} field can\'t use this number. '.$phone.' is already exist');
      return FALSE;
    }else {
      return TRUE;
    }
  }

  public function lostpassword()
  {
    $this->load->view('include/header');
    $this->load->view('auth/lost-password');
    $this->load->view('include/footer');
  }

  public function doforgot()
  {
    $this->form_validation->set_rules('email', 'Email Address', 'required');

    if ($this->form_validation->run() == false) {
      $this->data['email'] = array(
        'name'    => 'email',
        'id'      => 'email',
      );

      $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

      $this->load->view('include/header');
      $this->load->view('lost-password',$this->data);
      $this->load->view('include/footer');

    }else {
      $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

      if ($forgotten) {

        $email = $this->input->post('email');
        $message = 'Silahkan klik <a href="'.base_url().'member/password_reset/'.$forgotten['forgotten_password_code'].'">disini</a> untuk reset password anda.';
        $this->member->email($email, $subject = 'Reset Password', $message);

        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect("member/login", 'refresh'); //we should display a confirmation page here instead of the login page
      }else {
        $this->session->set_flashdata('message', $this->ion_auth->errors());
        redirect("member/lostpassword", 'refresh');
      }
    }
  }

  public function password_reset($code)
  {

    if (!$code)
		{
			show_404();
		}

    $user = $this->ion_auth->forgotten_password_check($code);

    if ($user) {
      $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
        $this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
          'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
          'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

        $this->load->view('include/header');
        $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
        $this->load->view('include/footer');
      }
      else {
        if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("member/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('member/password_reset/' . $code, 'refresh');
					}
				}
      }
    }
    else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("member/lostpassword", 'refresh');
		}
  }

  /**
   * @return array A CSRF key-value pair
   */
  public function _get_csrf_nonce()
  {
    $this->load->helper('string');
    $key = random_string('alnum', 8);
    $value = random_string('alnum', 20);
    $this->session->set_flashdata('csrfkey', $key);
    $this->session->set_flashdata('csrfvalue', $value);

    return array($key => $value);
  }

  /**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

  public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

  public function logout()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }
    $this->ion_auth->logout();
    delete_cookie('cart');
    delete_cookie('checkout');

    redirect('/');
  }

  public function city($province_id)
  {
    $city = $this->member->state($id='',$province_id);

    echo '<option value="">==Pilih Kota==</option>';

    if ($city['rajaongkir']['status']['code'] == 200) {
      foreach ($city['rajaongkir']['results'] as $key => $value) {
        echo '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>';
      }
    }
  }

  public function delete()
  {
    $this->db->where('id !=', 5)->delete('users');
  }

  public function testing()
  {

    $this->encryption->initialize(array(
      'chiper' => 'blowfish',
      'mode' => 'cfb',
      'key' => $this->config->item('encryption_key')
    ));


    $email = 'toniewibowo@gmail.com';

    $subject = 'Hai Yudi Registrasi anda Berhasil';
    $emaildata['name'] = 'Yudi';
    //$emaildata['email'] = str_replace('/','artdm', $this->encryption->encrypt($email));
    $emaildata['email'] = 'test';
    $message = $this->load->view('notification/registration',$emaildata,true);
    $kirim = $this->member->email($email,$subject,$message,$name="Info ARTademi");

    if ($kirim) {
      echo "Terkirim";
    }else {
      echo "Tak Terkirim";
    }

    // $this->load->view('include/header');
    // $this->load->view('mentor-upload');
    // $this->load->view('include/footer');


    //$id = '';
    //$province_id = 1;
    //$city = $this->member->state($id,$province_id);

    //$acak = random_string('alnum',8);

    //echo $acak;

    //print_r($city['rajaongkir']['results']);

    //print_r($filtered);
  }

}
