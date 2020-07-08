<?php

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * Name : Sketsa.cms base controller.
 *
 * @version 1.0.0
 *
 * @author : Arief Budiyono
 */
class Mentor extends MX_Controller
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
        $this->load->library('upload');

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
        $table_name = 'mentor';
        $this->db->where('table_name', $table_name);
        $table = $this->db->get('table')->row();
        //echo $table->action.'';

         $this->load->library('Grocery_CRUD');
        $this->load->library('Grocery_CRUD_Multiuploader');
        //$crud = new grocery_CRUD();
        $crud = new Grocery_CRUD_Multiuploader();

        $crud->set_table($table_name);
        $crud->set_subject($table->subject);

        // Required field
        if ($table->required != '') {
            $crud->required_fields(json_decode($table->required));
        }
        // Columns view
        if ($table->columns != '') {
            $crud->columns(json_decode($table->columns));
        }
        // Field view
        if ($table->field != '') {
            $crud->fields(json_decode($table->field));
        }

        $crud->field_type('active','dropdown',array('0' => 'NO', '1' => 'YES'));
        // Field upload
        if ($table->uploads != '') {
            $fields_upload = json_decode($table->uploads);
            foreach ($fields_upload as $field_upload) {
                $crud->set_field_upload($field_upload, 'assets/uploads/files');
            }
        }

         //============TAMBAHAN MULTIUPLOAD =================================================

         // Field upload
        if ($table->multiuploads != '') {

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


            $fields_multiupload = json_decode($table->multiuploads);
            foreach ($fields_multiupload as $field_upload) {
                //$crud->set_field_upload($field_upload, 'assets/uploads/files');
                $crud->new_multi_upload($field_upload,$config);
            }
        }


        //============END TAMBAHAN MULTIUPLOAD =================================================


        // Relation 1-n
        if ($table->relation_1 != 'null') {
            $fields_relation = json_decode($table->relation_1);
            foreach ($fields_relation as $field_relation) {
                $crud->set_relation($field_relation->field, $field_relation->table_name, $field_relation->field_view);
            }
        }
        // Unset action
        if ($table->action != '') {
            $action = json_decode($table->action);
            if (!in_array('Create', $action)) {
                $crud->unset_add();
            }
            if (!in_array('Read', $action)) {
                $crud->unset_read();
            }
            if (!in_array('Update', $action)) {
                $crud->unset_edit();
            }
            if (!in_array('Delete', $action)) {
                $crud->unset_delete();
            }
        }

        $crud->set_theme('flexigrid');
        $data = (array) $crud->render();
        if ($table->breadcrumb != 'null') {
            $crumbs = json_decode($table->breadcrumb);
            foreach ($crumbs as $value) {
                $add_crumb[$value->label] = $value->link;
            }
        } else {
            $add_crumb['table'] = '';
        }

        $this->output_view->set_wrapper('page', 'grocery', $data, false);
        $this->output_view->auth();

        $template_data['grocery_css'] = $data['css_files'];
        $template_data['grocery_js'] = $data['js_files'];

        $template_data['judul'] = $table->title;
        $template_data['crumb'] = $add_crumb;
        $template = $this->admin_template;

        //print_r($template_data);
       $this->output_view->output($template, $template_data);


              /*===============end tampilan grocery crud================================================*/



        }
    }

   public function view()
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
        $crud->where('mentor_id', 4);
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

    public function mentor_name($value,$row)
    {
      $mentor = $this->db->where('id',$value)->get('users')->row();

      return $mentor->full_name;
    }

    public function promo_start_date_callback($value,$primary_key)
    {
      $getDate = $this->db->where('mentor_class_id', $primary_key)->get('mentor_promo');

      $row = $getDate->row();

      if ($getDate->num_rows() > 0) {
        $value = $row->start_date;
      }else {
        $value = '';
      }

      return '<input type="text" class="datepicker-input form-control" id="field-promo_start_date" name="promo_start_date" value="'.$value.'" /> <a class="datepicker-input-clear" tabindex="-1">Clear</a> (dd/mm/yyyy)';
    }

    public function promo_end_date_callback($value,$primary_key)
    {
      $getDate = $this->db->where('mentor_class_id', $primary_key)->get('mentor_promo');

      $row = $getDate->row();

      if ($getDate->num_rows() > 0) {
        $value = $row->end_date;
      }else {
        $value = '';
      }

      return '<input type="text" class="datepicker-input form-control" id="field-promo_end_date" name="promo_end_date" value="'.$value.'" /> <a class="datepicker-input-clear" tabindex="-1">Clear</a> (dd/mm/yyyy)';
    }

    public function mentorclass()
    {
      if (!$this->ion_auth->logged_in()) {
        redirect('login');
      } else {


            /*==============tampilan grucery crud====================================================*/
      $table_name = 'mentor_class';
      //echo $table->action.'';

      $this->load->library('Grocery_CRUD');
      $this->load->library('Grocery_CRUD_Multiuploader');
      //$crud = new grocery_CRUD();
      $crud = new Grocery_CRUD_Multiuploader();

      $crud->set_table($table_name);
      $crud->set_subject('Mentor Class');
      $crud->add_action('Video', '', 'admin/mentor/list_video','admin-list-video');

      $crud->unset_add();
      $crud->unset_read();

      // Required field
      $crud->required_fields();

      // Columns view
      $crud->columns('user_id','category_product_id','title','poster','posting_date','approve');

      $crud->callback_column('poster',array($this,'countvideo'));

      // Field view
      $crud->fields('user_id','category_product_id','subcategory_product_id','title','resume','description','posting_date','tags','price','sale','poster','thriller','video_id','ytube_embeded','approve','promo_start_date','promo_end_date');

      $crud->field_type('approve','dropdown', array('0' => 'No', '1' => 'Yes'));

      $classID = $this->uri->segment(5);

      $crud->field_type('promo_start_date','date', $classID);
      $crud->field_type('promo_end_date','date', date('d/m/Y'));
      $crud->callback_edit_field('promo_start_date',array($this,'promo_start_date_callback'));
      $crud->callback_edit_field('promo_end_date',array($this,'promo_end_date_callback'));

      $crud->display_as('user_id','Mentor');
      $crud->display_as('category_product_id','Class Category');
      $crud->display_as('subcategory_product_id','Class Subcategory');
      $crud->display_as('ytube_embeded','YouTube Embeded[]');

      $crud->set_relation('user_id','users','full_name');
      $crud->set_relation('category_product_id','category_product','category_product_name');
      $crud->set_relation('subcategory_product_id','subcategory_product','name');

      $crud->callback_before_update(array($this, 'unset_date_promo_callback'));
      $crud->callback_after_update(array($this, 'set_date_promo_callback'));

      //$crud->set_relation_n_n('group_name','users_groups','groups','user_id','group_id','name');

      // Field upload
      $crud->set_field_upload('poster', 'assets/uploads/files');
      $crud->set_field_upload('thriller', 'assets/uploads/videos');

       //============TAMBAHAN MULTIUPLOAD =================================================

       // Field upload

       $config = array(

      /* Destination directory */
      "path_to_directory"       =>'assets/uploads/videos/',

      /* Allowed upload type */
      "allowed_types"           =>'.3gp|mp4|flv|ogg',

      /* Show allowed file types while editing ? */
      "show_allowed_types"      => true,

      /* No file text */
      "no_file_text"            =>'No Video',

      /* enable full path or not for anchor during list state */
      "enable_full_path"        => false,

      /* Download button will appear during read state */
      "enable_download_button"  => true,

      /* One can restrict this button for specific types...*/
      "download_allowed"        => 'jpg'
      );

      //$crud->new_multi_upload('thriller',$config);


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

    public function unset_date_promo_callback($post,$primary_key)
    {

      $startdate  = date('Y-m-d',strtotime(str_replace('/','-',$post['promo_start_date'])));
      $enddate    = date('Y-m-d',strtotime(str_replace('/','-',$post['promo_end_date'])));

      $cekPrimary = $this->db->where('mentor_class_id', $primary_key)->get('mentor_promo')->num_rows();

      if ($cekPrimary > 0) {

        $data = array(
          'start_date' => $startdate,
          'end_date' => $enddate
        );

        $this->db->where('mentor_class_id', $primary_key)->set($data)->update('mentor_promo');

      }else {

        $data = array(
          'mentor_class_id' => $primary_key,
          'start_date' => $startdate,
          'end_date' => $enddate
        );

        $this->db->insert('mentor_promo',$data);

      }

      unset($post['promo_start_date']);
      unset($post['promo_end_date']);

      return $post;
    }



    public function countvideo($value,$row)
    {
      //$datavideo = $this->db->where('mentor_class_id',$row->video_id)->get('mentor_class')->row();

      $countvideo = $this->db->where('video_id',$row->video_id)->get('mentor_video')->num_rows();

      return '<div style="position:relative"><img width="100" src="'.base_url('assets/uploads/files/'.$value).'" alt="" /> <span style="position:absolute;top:5px; right:5px; background:red; color:white;padding: 0px 6px; border-radius: 20px; font-weight: 700;">'.$countvideo.'</span> </div>';
    }



    public function list_video($id)
    {
      if (!$this->ion_auth->logged_in()) {
        redirect('login');
      } else {


            /*==============tampilan grucery crud====================================================*/
      $table_name = 'mentor_video';
      //echo $table->action.'';

      $this->load->library('Grocery_CRUD');
      $this->load->library('Grocery_CRUD_Multiuploader');
      //$crud = new grocery_CRUD();
      $crud = new Grocery_CRUD_Multiuploader();

      $crud->set_table($table_name);

      $crud->set_theme('flexigrid');
      $data = (array) $crud->render();

      $row = $this->db->where('mentor_class_id',$id)->get('mentor_class')->row();

      $data['queryVideo'] = $this->db->where('video_id',$row->video_id)->get('mentor_video');

      $this->output_view->set_wrapper('page', 'template/mentor-video', $data, false);
      $this->output_view->auth();

      $template_data['grocery_css'] = $data['css_files'];
      $template_data['grocery_js'] = $data['js_files'];

      $template_data['judul'] = 'Mentor Video';
      $template_data['crumb'] = ['Mentor' => 'admin/mentor','Mentor Class' => 'admin/mentor/mentorclass','Video' => '#'];
      $template = $this->admin_template;



      //print_r($template_data);
     $this->output_view->output($template, $template_data);


    /*===============end tampilan grocery crud================================================*/



      }
    }

    public function uploadvideo()
    {
      if (!$this->ion_auth->logged_in()) {
        redirect('sketsanet/dashboard');
      }

      if (isset($_POST['videodescription'])) {

        $id  = $this->input->post('id',true);
        $vd  = $this->input->post('videodescription',true);

        $updateDescription = $this->db->where('mentor_video_id',$id)->set('description',$vd)->update('mentor_video');

        if ($updateDescription) {
          echo 1;
        }else {
          echo 0;
        }
      }

      if (isset($_FILES['videomentor']['name'])) {

        $filename = $_FILES['videomentor']['name'];
        $filename = random_string('alnum',5).'-'.str_replace(' ','-',$filename);
        $tmpname  = $_FILES['videomentor']['tmp_name'];

        $video_id  = $this->input->post('videoid',true);



        $config['upload_path']      = './assets/uploads/videos/';
        $config['allowed_types']    = '3gp|flv|mp4|mp3|avi';
        $config['file_name']        = $filename;
        $config['max_size']         = 15000;

        //print_r($_FILES);

        $this->upload->initialize($config);

        if (! $this->upload->do_upload('videomentor')) {
          $error = array('error' => $this->upload->display_errors());
          echo 'Video failed to upload. '.$error['error'];
        }else {
          $updatevideo = $this->db->where('mentor_video_id',$video_id)->set('video',$filename)->update('mentor_video');

          if ($updatevideo) {

            echo 'Upload '.$this->upload->data('file_name').' success.';
          }else {
            echo "video gagal update";
          }

        }

        // if (move_uploaded_file($tmpname,$upload_path.$filename)) {
        //
        //   $inserVideo = $this->db->insert('mentor_video',$datavideo);
        //
        //   echo $_FILES['videomentor']['name']." 100% upload completed";
        //
        // }else {
        //
        //   echo $filename.' upload failed - error: '.$_FILES['videomentor']['error'];
        // }

      }

    }

    public function preview($id)
    {
      if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()) {
        redirect('login');
      }

      $data = $this->db->where('mentor_video_id',$id)->get('mentor_video')->row();
      $videoType = substr($data->video,-3);

      echo '<div class="embed-responsive embed-responsive-16by9">
        <video controls controlsList="nodownload">
          <source src="'.base_url('assets/uploads/videos/'.$data->video) .'" type="video/'.$videoType.'">
        </video>
      </div>';
    }

    public function delete()
    {
      if (!$this->input->is_ajax_request()) {
        redirect('admin/mentor');
      }

      $id = $this->input->post('id',true);

      $row = $this->db->where('mentor_video_id',$id)->get('mentor_video')->row();

      unlink('./assets/uploads/videos/'.$row->video);

      $deleteVideo = $this->db->where('mentor_video_id',$id)->delete('mentor_video');

      if ($deleteVideo) {
        echo 1;
      }else {
        echo 0;
      }

    }




}
