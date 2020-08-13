<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mentor_model','mentor');
    $this->load->model('member_model','member');
    $this->load->library(array('upload','app'));
  }

  function index()
  {
    $data['queryMentor'] = $this->db->where('mentor.active',1)->order_by('mentor.mentor_id','desc')->select('mentor.*,mentor.mentor_id as id_mentor, users.*')->from('mentor')->join('users','users.id = mentor.user_id')->get();

    $this->load->view('include/header');
    $this->load->view('mentor',$data);
    $this->load->view('include/footer');
  }

  public function view($id,$slug)
  {

    $data['queryMentor'] = $this->db->where('mentor.active',1)->where('category_class_id',$id)->order_by('mentor.mentor_id','desc')->select('mentor.*,mentor.mentor_id as id_mentor, users.*')->from('mentor')->join('users','users.id = mentor.user_id')->get();

    $this->load->view('include/header');
    $this->load->view('mentor',$data);
    $this->load->view('include/footer');
  }

  public function dashboard($action='', $id='')
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['fullName'] = $user->full_name;

    $data['userID'] = $user->id;

    $this->load->view('include/header');

    if ($action == 'edit') {
      $data['classCategory'] = $this->db->get('category_product');
      $data['classData'] = $this->db->where('mentor_class_id', $id)->get('mentor_class');

      $row = $data['classData']->row();

      $data['listVideo'] = $this->db->where('video_id', $row->video_id)->where('youtube_link', '')->get('mentor_video');
      $this->load->view('mentor-admin',$data);
    }else {
      $data['mentorClass'] = $this->db->where('user_id', $user->id)->where('approve',1)->get('mentor_class');
      $this->load->view('mentor-dashboard',$data);
    }

    $this->load->view('include/footer');
  }

  public function delete_thriller($id,$slug)
  {
    $this->mentor->deletethriller($id);

    redirect('mentor/dashboard/edit/'.$id.'/'.$slug);

  }

  public function deletelistvideo($pid,$id,$slug)
  {
    // UNLINK VIDEO
    $row = $this->db->where('mentor_video_id', $id)->get('mentor_video')->row();

    if (file_exists('./assets/uploads/videos/'.$row->video)) {
      unlink('./assets/uploads/videos/'.$row->video);
    }

    $this->db->where('mentor_video_id', $id);
    $this->db->delete('mentor_video');

    redirect('mentor/dashboard/edit/'.$pid.'/'.$slug);
  }

  public function updatevideo()
  {
    if (isset($_FILES['thriller']['tmp_name'])) {

      $id = $this->input->post('mentor_class_id',true);

      $tmpname = $_FILES['thriller']['tmp_name'];
      $filename = random_string('alnum',5).'-'.$_FILES['thriller']['name'];
      $upload_path      = './assets/uploads/videos/';
      $filetype = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

      if ($filetype == 'mp4') {
        if (move_uploaded_file($tmpname,$upload_path.$filename)) {

          $this->db->where('mentor_class_id', $id)->set('thriller',$filename)->update('mentor_class');

          echo 1;
        }else {

          echo 'file error: '.$_FILES['thriller']['error'];
        }
      }else {
        echo "video anda harus dengan format MP4";
      }
    }

    if (isset($_POST['thriller_youtube'])) {
      $link     = $this->input->post('thriller_youtube', true);
      $class_id = $this->input->post('class_id', true);

      $updateThriller = $this->db->where('mentor_class_id', $class_id)->set('thriller',$link)->update('mentor_class');

      if ($updateThriller) {
        echo 1;
      }else {
        echo 0;
      }
    }

    if (isset($_POST['youtube_link'])) {
      $classID = $this->input->post('class_id');
      $userID = $this->input->post('user_id');
      $videoID = $this->input->post('video_id');
      $link = $this->input->post('youtube_link');

      $data = array(
        'ytube_embeded' => $link
      );

      $updateLinkYoutube = $this->db->where('mentor_class_id', $classID)->set($data)->update('mentor_class');

      if ($updateLinkYoutube) {

        $links = explode(',', trim($link));

        foreach ($links as $key => $value) {
          $exist = $this->db->where('youtube_link', $value)->get('mentor_video');

          if ($exist->num_rows() > 0) {
            $this->db->where('youtube_link', $value)->set('youtube_link',$value)->update('mentor_video');
          }else {
            $this->db->insert('mentor_video', array('user_id' => $userID, 'video_id' => $videoID, 'youtube_link' => $value));
          }

        }

        echo 1;
      }else {
        echo 0;
      }
    }

    if (isset($_POST['title']) && isset($_POST['link'])) {
      $title  = $this->input->post('title', true);
      $link   = $this->input->post('link', true);

      $updateTitle = $this->db->where('youtube_link', $link)->set('description', $title)->update('mentor_video');

      if ($updateTitle) {
        echo 1;
      }else {
        echo 0;
      }
    }

    if (isset($_FILES['video_list']['tmp_name'])) {

      $id = $this->input->post('mentor_video_id',true);

      $tmpname = $_FILES['video_list']['tmp_name'];
      $filename = random_string('alnum',5).'-'.$_FILES['video_list']['name'];
      $upload_path      = './assets/uploads/videos/';
      $filetype = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

      if (!empty($_POST['old_video'])) {
        if (file_exists($upload_path.$_POST['old_video'])) {
          unlink('./assets/uploads/videos/'.$_POST['old_video']);
        }

      }

      if ($filetype == 'mp4') {
        if (move_uploaded_file($tmpname,$upload_path.$filename)) {

          $updatevideo = $this->db->where('mentor_video_id', $id)->set('video',$filename)->update('mentor_video');

          if ($updatevideo) {
            echo 'Hasil Post: '.$filename.' ID: '.$id.' Old Video: '.$_POST['old_video'];
          }else{
            echo 'Tidak Terupdate';
          }
        }else {

          echo 'file error: '.$_FILES['thriller']['error'];
        }
      }else {
        echo "video anda harus dengan format MP4";
      }
    }

    // UPDATE VIDEO MENTOR PROFILE
    if (isset($_FILES['videomentor']['tmp_name'])) {

      $id = $this->input->post('mentor_id',true);

      $tmpname = $_FILES['videomentor']['tmp_name'];
      $filename = random_string('alnum',5).'-'.$_FILES['videomentor']['name'];
      $upload_path      = './assets/uploads/videos/';
      $filetype = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

      $row = $this->db->where('mentor_id',$id)->get('mentor')->row();

      if ($row->mentor_video !='') {
        if (file_exists($upload_path.$row->mentor_video)) {
          unlink('./assets/uploads/videos/'.$row->mentor_video);
        }

      }

      if ($filetype == 'mp4') {
        if (move_uploaded_file($tmpname,$upload_path.$filename)) {

          $updatevideo = $this->db->where('mentor_id', $id)->set('mentor_video',$filename)->update('mentor');

          if ($updatevideo) {
            echo $filename.' Behasil diupdate.';
          }else{
            echo $filename.' Tidak Terupdate';
          }
        }else {

          echo 'file error: '.$_FILES['videomentor']['error'];
        }
      }else {
        echo "Update gagal. Video harus dengan format MP4";
      }

    }

    if (isset($_POST['video_description'])) {
      $description = $this->input->post('video_description',true);
      $id = $this->input->post('mentor_video_id',true);

      $updateDescription = $this->db->where('mentor_video_id', $id)->set('description',$description)->update('mentor_video');

      if ($updateDescription) {
        echo 1;
      }else {
        echo 2;
      }
    }

    if (!empty($_FILES['poster']['tmp_name'])) {

      $id = $this->input->post('mentor_class_id',true);

      $filename = random_string('alnum',5).'-'.$_FILES['poster']['name'];
      $tmpname  = $_FILES['poster']['tmp_name'];
      $path     = './assets/uploads/files/';
      $filetype = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

      if ($filetype == 'jpg' || $filetype == 'jpeg' || $filetype == 'png' || $filetype == 'gif') {
        if (move_uploaded_file($tmpname,$path.$filename)) {
          //UNLINK FILE BEFORE UPDATE
          $row = $this->db->where('mentor_class_id', $id)->get('mentor_class')->row();

          if (file_exists($path.$row->poster)) {
            unlink($path.$row->poster);
          }

          $updatePoster = $this->db->where('mentor_class_id', $id)->set('poster',$filename)->update('mentor_class');

          if ($updatePoster) {
            echo 1;
          }else {
            echo "image masuk direktori tapi gagal di update";
          }
        }else {

          $error = $_FILES['poster']['error'];

          echo 'Image yang di upload error '.$error;
        }
      }else {
        echo "Tipe file harus jpg|jpeg|png|gif. Tipe file yang anda upload tidak diizinkan";
      }


    }

    if (isset($_POST['btnUpdate']) && $_POST['btnUpdate'] == '1') {
      $data['category_product_id'] = $this->input->post('category',true);
      $data['title'] = $this->input->post('title',true);
      $data['resume'] = $this->input->post('resume',true);
      $data['description'] = $this->input->post('description',true);
      $data['price'] = $this->input->post('price',true);
      $data['sale'] = $this->input->post('sale',true);
      $data['tags'] = $this->input->post('tags',true);
      $data['posting_date'] = $this->input->post('posting_date',true);
      $id = $this->input->post('id',true);

      $updateClass = $this->db->where('mentor_class_id', $id)->set($data)->update('mentor_class');

      if ($updateClass) {
        $this->session->set_flashdata('updateclass',true);
      }else {
        $this->session->set_flashdata('errorupdateclass',true);
      }

      redirect('mentor/dashboard/edit/'.$id.'/'.url_title($data['title'],'-',true));
    }
  }

  public function detail($id,$slug)
  {
    $data['mentorDetail'] = $this->db->where('mentor.mentor_id', $id)->from('mentor')->join('users','users.id = mentor.user_id')->get();

    $row = $data['mentorDetail']->row();

    $data['mentorClass']  = $this->db->where('user_id', $row->user_id)->where('approve',1)->get('mentor_class');

    $this->load->view('include/header');
    $this->load->view('mentor-detail',$data);
    $this->load->view('include/footer');

  }

  public function review()
  {
    $data = [
      'mentor_class_id'  => $this->input->post('class_id',true),
      'user_id' 		     => $this->input->post('user_id',true),
      'star'             => $this->input->post('star',true),
		  'description'	     => $this->input->post('review',true)
    ];

    if (isset($_POST['star']) && $_POST['star'] != 0) {

      if ($this->mentor->check_review($data['user_id'], $data['mentor_class_id'])) {

        $insertReview = $this->db->insert('review', $data);

        if ($insertReview) {
          $this->session->set_flashdata('rating-alert','Terima kasih telah memberikan review pada kelas ini');
        }else {
          $this->session->set_flashdata('rating-alert','Maaf, anda gagal memberikan review');
        }
      }else {

        $this->db->where('mentor_class_id', $data['mentor_class_id']) -> where('user_id', $data['user_id']) -> set($data) -> update('review');

        $this->session->set_flashdata('rating-alert','Anda pernah memberikan review pada kelas ini, review berhasil diupdate');
      }

    }else {

      $this->session->set_flashdata('rating-alert','Review gagal, star rating harus diisi.');
    }

    redirect('course/'.$_POST['class_id'].'/'.$_POST['slug']);
  }

  public function videodetail($id,$slug)
  {

    $data['classDetail'] = $this->db->where('mentor_class_id', $id)->from('mentor_class')->join('users','users.id = mentor_class.user_id')->get();

    $row = $data['classDetail']->row();

    $data['mentor'] = $this->db->where('user_id',$row->user_id)->get('mentor')->row();

    $data['videoDetail'] = $this->db->where('video_id',$row->video_id)->get('mentor_video');

    $data['queryReview'] = $this->db->where('mentor_class_id', $id) -> from('review') -> join('users','users.id = review.user_id') -> get();

    $this->load->view('include/header');
    $this->load->view('video-detail', $data);
    $this->load->view('include/footer');
  }

  public function profile()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['queryCategory'] = $this->db->get('category_product');

    $data['mentor'] = $this->db->where('user_id', $user->id)->from('mentor')->join('users','users.id = mentor.user_id')->get();

    $this->load->view('include/header');
    $this->load->view('mentor-profile',$data);
    $this->load->view('include/footer');
  }

  public function update_profile()
  {
    if (isset($_POST['btnUpdateProfile']) && $_POST['btnUpdateProfile'] == 'Save') {
      $data['category_class_id']  = $this->input->post('classcategory',true);
      $data['subcategory_class_id']  = $this->input->post('subcategory_class_id',true);
      $data['class_name']         = $this->input->post('classname',true);
      $data['account_name']       = $this->input->post('accountname',true);
      $data['account_number']     = $this->input->post('accountnumber',true);
      $data['account_bank']       = $this->input->post('bankname',true);

      $data['facebook']           = $this->input->post('facebook',true);
      $data['instagram']          = $this->input->post('instagram',true);
      $data['twitter']            = $this->input->post('twitter',true);
      $data['linkedin']           = $this->input->post('linkedin',true);

      $data['province_id']        = $this->input->post('province_id',true);
      $data['city_id']            = $this->input->post('city_id',true);
      $data['address']            = $this->input->post('address',true);
      $data['postal_code']        = $this->input->post('postal_code',true);
      $data['resume']             = $this->input->post('resume',true);
      $data['profile']            = $this->input->post('description',true);
      $id = $this->input->post('mentor_id',true);

      $updateMentorPrifile = $this->db->where('mentor_id', $id)->set($data)->update('mentor');

      if ($updateMentorPrifile) {

        $this->session->set_flashdata('updatementorprofile',true);

        redirect('mentor/profile');
      }

    }else {
      redirect('/');
    }
  }

  public function upload()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    if ($this->session->userdata('video_id') == null) {

      $random = random_string('alnum',8);

      $this->session->set_userdata('video_id',$random);

    }

    $this->load->view('include/header');
    $this->load->view('mentor-upload');
    $this->load->view('include/footer');
  }

  public function uploadvideo()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $data['user_id']             = $this->input->post('user_id',true);
    $data['category_product_id'] = $this->input->post('classcategory',true);
    $data['subcategory_product_id'] = $this->input->post('subcategory_product_id',true);
    $data['title']               = $this->input->post('title',true);
    $data['resume']              = $this->input->post('resume',true);
    $data['description']         = $this->input->post('description',true);
    $data['posting_date']        = $this->input->post('posting_date',true);
    $data['tags']                = $this->input->post('tags',true);
    $data['price']               = $this->input->post('price',true);
    $data['sale']                = $this->input->post('sale',true);
    $data['ytube_embeded']       = $this->input->post('youTubeEmbeded',true);
    $data['thriller']            = $this->input->post('thriller',true);
    $data['video_id']            = strtoupper($this->input->post('video_id',true));



    if (isset($_POST['submitVideo']) && $_POST['submitVideo'] == 'Upload') {

      $insertDataclass = $this->db->insert('mentor_class', $data);

      if ($insertDataclass) {

        $videoDescription = $_POST['video_description'];
        $getvideo         = $this->db->where('video_id',$data['video_id'])->order_by('mentor_video_id','asc')->get('mentor_video');


        if ($getvideo->num_rows() > 0) {
          foreach ($getvideo->result() as $key => $value) {

            $this->db->where('video_id',$value->video_id)->where('mentor_video_id',$value->mentor_video_id)->set('description',$videoDescription[$key])->update('mentor_video');

          }
        }

        $this->session->unset_userdata('video_id');

        $this->session->set_flashdata('upload', 'Your class data successfully update');

        redirect('mentor/dashboard');
      }
    }else {
      if (isset($_FILES['videomentor']['name'])) {

        $filename = $_FILES['videomentor']['name'];
        $filename = random_string('alnum',5).'-'.str_replace(' ','-',$filename);
        $tmpname = $_FILES['videomentor']['tmp_name'];

        $dataID = explode(',', $this->input->post('video_id',true));

        $datavideo['video_id']    = strtoupper($this->input->post('video_id',true));
        $datavideo['user_id']     = $this->input->post('user_id',true);
        $datavideo['video']       = $filename;

        $upload_path      = './assets/uploads/videos/';

        //print_r($_FILES);

        //$this->upload->initialize($config);

        if (move_uploaded_file($tmpname,$upload_path.$filename)) {

          $inserVideo = $this->db->insert('mentor_video',$datavideo);

          echo $_FILES['videomentor']['name']." 100% upload completed";

        }else {

          echo $filename.' upload failed - error: '.$_FILES['videomentor']['error'];
        }

        $this->session->set_flashdata('upload', 'Video successfully update');

      }elseif (isset($_FILES['posterUpload']['name']) && !empty($_FILES['poster']['name'])) {

        $filename = $_FILES['poster']['name'];
        $filename = random_string('alnum',5).'-'.str_replace(' ','-',$filename);

        $input  = 'posterUpload';
        $size   = 2000;
        $path   ='./assets/uploads/files/';
        $type   ='jpg|jpeg|gif|png';

        if ($this->mentor->uploadFile($filename, $input, $size, $path,$type)) {
          // CHECK VIDEO ID
          $checkVideoID = $this->db->where('video_id', $data['video_id'])->get('mentor_class');

          if ($checkVideoID->num_rows() > 0) {
            $updatePoster = $this->db->where('video_id', $data['video_id'])->set('poster', $filename)->update('mentor_class');

            if ($updatePoster) {
              echo "Poster successfully updated";
            }
          }else {
            $insertPoster = $this->db->insert('mentor_class', array('poster' => $filename));

            if ($insertPoster) {
              echo "Poster successfully uploaded";
            }
          }
        } else {
          echo "Poster failed to upload";
        }

      } elseif (isset($_FILES['filemateri']['name'])) {

        $name = 'filemateri';
        $data = array(
          'video_id' => $this->input->post('video_id',true),
          'user_id' => $this->input->post('user_id',true),
          'posting_date' => date('Y-m-d')
        );

        $upload = $this->mentor->multiple_upload($name, $data);

        //print_r($upload);

        foreach ($upload['images'] as $key => $image) {
          echo '

            <div class="col-lg-3 mb-4">
              <div class="card">
                <div class="card-body p-2">
                  <img class="img-fluid" src="'.base_url('assets/uploads/materi/'.$data['user_id'].'/'.date('dmY').'/'.$image).'" alt="" />
                </div>
              </div>

            </div>
          ';
        }

        // $files = $_FILES['filemateri']['name'];
        //
        // foreach ($files as $key => $value) {
        //   $filename = random_string('alnum',5).'-'. $_FILES['filemateri']['name'][$key];
        //   echo $filename.'<br />';
        // }

        $this->session->set_flashdata('upload', 'Material Video successfully update');

      }
      else {
        redirect('mentor/upload');
      } //END FILENAME
    }
  }

  public function preview()
  {
    if (!$this->ion_auth->logged_in() || !$this->input->is_ajax_request()) {
      redirect('/');
    }

    $data = $this->db->order_by('mentor_video_id','desc')->get('mentor_video')->row();
    $videoType = substr($data->video,-3);

    echo '<div class="embed-responsive embed-responsive-16by9">
      <video controls controlsList="nodownload">
        <source src="'.base_url('assets/uploads/videos/'.$data->video) .'" type="video/'.$videoType.'">
      </video>
    </div>';
  }

  public function wishlist()
  {

    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $this->load->view('include/header');
    $this->load->view('mentor-upload');
    $this->load->view('include/footer');
  }

  public function purchased()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $user = $this->ion_auth->user()->row();

    $data['getOrder'] = $this->db->where('payment', 1)->where('user_id', $user->id)->get('orders');

    $this->load->view('include/header');
    $this->load->view('purchased',$data);
    $this->load->view('include/footer');
  }

  public function register()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    $data['queryProvince'] = $this->member->province();
    $data['queryCategory'] = $this->db->order_by('category_product_id','asc')->get('category_product');

    $this->load->view('include/header');
    $this->load->view('mentor-register',$data);
    $this->load->view('include/footer');
  }

  public function doregister()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('/');
    }

    //$filename = $_FILES['videoprofile']['name'];
    //$filename = random_string('alnum',5).'-'.$filename;

    $data['user_id']            = $this->input->post('user_id',true);
    $data['class_name']         = $this->input->post('classname',true);
    $data['category_class_id']  = $this->input->post('classcategory',true);
    //$data['mentor_video']       = $filename;
    $data['account_name']       = $this->input->post('accountname',true);
    $data['account_number']     = $this->input->post('accountnumber',true);
    $data['account_bank']       = $this->input->post('bankname',true);
    $data['province_id']        = $this->input->post('province',true);
    $data['city_id']            = $this->input->post('city',true);
    $data['address']            = $this->input->post('address',true);
    $data['postal_code']        = $this->input->post('postal_code',true);

    $this->form_validation->set_rules('classname', 'Class Name', 'required');
    $this->form_validation->set_rules('classcategory', 'Class Category', 'required');
    $this->form_validation->set_rules('mentor_video', 'Video', 'trim|required');
    $this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required');
    $this->form_validation->set_rules('accountname', 'Account Name', 'trim|required');
    $this->form_validation->set_rules('accountnumber', 'Account Number', 'trim|required');
    $this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required');
    $this->form_validation->set_rules('province', 'Province', 'trim|required');
    $this->form_validation->set_rules('city', 'City', 'trim|required');
    $this->form_validation->set_rules('address', 'Address', 'trim|required');
    $this->form_validation->set_rules('postal_code', 'Postal Code', 'trim|required');

    if (! $this->form_validation->run() == FALSE) {
      $this->load->view('include/header');
      $this->load->view('mentor-register',$data);
      $this->load->view('include/footer');
    }else {

      //Check ID is already a mentor or not

      $cekid = $this->db->where('user_id',$data['user_id'])->get('mentor')->num_rows();

      if ($cekid > 0) {
        echo '<script type="text/javascript">alert("Anda sudah terdaftar sebagai mentor"); window.location.href="'.site_url().'";</script>';
      }else {

        // if (isset($filename)) {
        //   $input = 'videoprofile';
        //   $size= 4000;
        //   $path='./assets/uploads/videos/';
        //   $type='3gp|flv|mp4|mp3|avi';
        //
        //   $uploadvideo = $this->mentor->uploadFile($filename,$input,$size,$path,$type);
        //
        // }//END FILENAME

        $inserMentor = $this->db->insert('mentor',$data);

        if ($inserMentor) {
          $group['user_id'] = $data['user_id'];
          $group['group_id'] = 4;

          //CEK GROUP

          $checkGroup = $this->db->where('user_id',$group['user_id'])->where('group_id',$group['group_id'])->get('users_groups')->num_rows();

          if ($checkGroup == 0) {
            $insertGroup = $this->db->insert('users_groups',$group);
          }

          $user = $this->ion_auth->user()->row();

          $emailto = 'toniewibowo@gmail.com';
          $subject = $user->full_name.' mendaftar sebagai mentor';
          $message = 'Hai admin member '.$user->full_name.' mendaftar sebagai mentor, silahkan melakukan approval';
          $name = 'no-reply';

          $this->member->email($emailto,$subject,$message,$name);

          $this->session->set_flashdata('mentor_registrant',true);

        }

        redirect('mentor/register');
      }

    }


  }

  public function uploadPhoto()
  {
    $filename = $_FILES['photo']['name'];
    $filename = random_string('alnum',5).'-'.$filename;
    $tmpname = $_FILES['photo']['tmp_name'];
    $upload_path = './images/avatars/';
    $user_id = $this->input->post('user_id',true);
    $input = 'photo';

    if (move_uploaded_file($tmpname,$upload_path.$filename)) {
      $dataPhoto = array(
        'photo' => $filename
      );

      $this->db->where('id', $user_id)->set($dataPhoto)->update('users');

      echo "uploaded";
    }else {
      echo 'Upload gagal terjadi error - '.$_FILES['photo']['error'];
    }

    //echo $this->mentor->uploadPhoto($user_id,$filename,$input);

  }

  public function testing()
  {

    echo 'total dibeli: '. $this->mentor->video_puchased_by_id(1);

    $this->db->where('mentor_materi_id <=', 45)->delete('mentor_materi');

    $this->db->where('video_id', $this->session->userdata('video_id'))->set('posting_date',date('Y-m-d'))->update('mentor_materi');
    $user = $this->ion_auth->user()->row();

    $makediruser = './assets/uploads/materi/'.$user->id;
    $makedirdate = './assets/uploads/materi/'.$user->id.'/'.date('dmY');

    if (!is_dir($makediruser)) {
      mkdir($makediruser);
      if (!is_dir($makedirdate)) {
        mkdir($makedirdate);
      }
      echo "Not Exist";
    }else {
      echo "Exist";
    }

    // if (isset($_POST['button'])) {
    //   $jakarta = $_POST['jakarta'];
    //   print_r($jakarta);
    //
    //   foreach ($jakarta as $key => $value) {
    //     echo $value.'<br />';
    //   }
    // }

    echo '
    <form class="" action="'.site_url('mentor/uploadvideo').'" method="post" enctype="multipart/form-data">
      <input type="hidden" name="video_id" value="12356">
      <input type="hidden" name="user_id" value="10">
      <input type="file" name="filemateri[]" value="" multiple>

      <button type="submit" name="button">Test</button>
    </form>
    ';

  }

}
