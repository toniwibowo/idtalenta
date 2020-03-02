<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 *
 * @version 1.0.0
 *
 * @author : Arief Budiyono
 */
class Member extends MX_Controller
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
        $this->config->load('sketsanet');
        $this->load->library('output_view');

        // Site
        $site = $this->config->item('site');
        $this->title = $site['title'];
        $this->logo = $site['logo'];

        // Template
        $template = $this->config->item('template');
        $this->admin_template = $template['backend_template'];
        $this->front_template = $template['front_template'];
        $this->auth_template = $template['auth_template'];
       // $this->youtubeanak_template = $template['youtubeanak_template'];

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
    }

   public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            if ($this->default_page == '') {
                $this->login();
            } else {
               $this->page($this->default_page);
                //echo $this->default_page;
            }
        } else {


              /*==============tampilan grucery crud====================================================*/
        $table_name = 'users';
        //echo $table->action.'';

        $this->load->library('Grocery_CRUD');
        $this->load->library('Grocery_CRUD_Multiuploader');
        //$crud = new grocery_CRUD();
        $crud = new Grocery_CRUD_Multiuploader();

        $crud->set_table($table_name);
        $crud->set_subject('Member');
        $crud->where('member_id', 2);
        $crud->unset_add();

        // Required field
        $crud->required_fields();

        // Columns view
        $crud->columns('full_name','email','referal_code','active');

        //$crud->callback_column('full_name',array($this,'list_member'));

        // Field view
        $crud->fields('username','email','full_name','photo','password');

        //$crud->set_relation('user_id','users','username');

        //$crud->set_relation_n_n('group_name','users_groups','groups','user_id','group_id','name');

        // Field upload
        $crud->set_field_upload('photo', 'assets/uploads/files');

         //============TAMBAHAN MULTIUPLOAD =================================================

         // Field upload

         $config = array(

        /* Destination directory */
        "path_to_directory"       =>'assets/uploads/files/',

        /* Allowed upload type */
        "allowed_types"           =>'gif|jpeg|jpg|png',

        /* Show allowed file types while editing ? */
        "show_allowed_types"      => true,

        /* No file text */
        "no_file_text"            =>'No Pictures',

        /* enable full path or not for anchor during list state */
        "enable_full_path"        => false,

        /* Download button will appear during read state */
        "enable_download_button"  => true,

        /* One can restrict this button for specific types...*/
        "download_allowed"        => 'jpg'
        );

        //$crud->new_multi_upload($field_upload,$config);


        //============END TAMBAHAN MULTIUPLOAD =================================================


        $crud->set_theme('flexigrid');
        $data = (array) $crud->render();

        $this->output_view->set_wrapper('page', 'grocery', $data, false);
        $this->output_view->auth();

        $template_data['grocery_css'] = $data['css_files'];
        $template_data['grocery_js'] = $data['js_files'];

        $template_data['judul'] = 'Member';
        $template_data['crumb'] = ['member' => 'admin/member'];
        $template = $this->admin_template;

        //print_r($template_data);
       $this->output_view->output($template, $template_data);


              /*===============end tampilan grocery crud================================================*/



        }
    }

    public function list_member($value,$row)
    {
      $listmember = $this->db->where('group_id',2)->where('user_id',$row->id)->get('users_groups')->row();

      return $listmember->group_id;
    }




}
