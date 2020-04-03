<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
		$keywords = $this->input->get('src');

		$keyword = explode(' ', $keywords);

		//print_r($keyword);

		$like = '';

		$countKeyword = (integer)count($keyword) - 1;

		for ($i=0; $i <= $countKeyword  ; $i++) {

      $like .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i < $countKeyword) {

				$like .= ' OR title ';

			}

		}

		//echo $like;

		$data['queryResult'] = $this->db->query("SELECT * FROM mentor_class WHERE title $like");

    $mentor = '';

    for ($i=0; $i <= $countKeyword  ; $i++) {

      $mentor .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i < $countKeyword) {

				$mentor .= ' OR full_name ';

			}

		}

    $className = '';

    for ($i=0; $i <= $countKeyword  ; $i++) {

      $className .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i < $countKeyword) {

				$className .= ' OR class_name ';

			}

		}

    $data['searchResultMentor'] = $this->db->query("SELECT mentor.*, users.full_name, users.photo FROM mentor RIGHT JOIN users ON mentor.user_id = users.id WHERE mentor.active = 1 AND full_name $mentor OR class_name $className");

		//print_r($data['queryResult']->result_array());


    $this->load->view('include/header');
		$this->load->view('search', $data);
		$this->load->view('include/footer');
  }

  public function mentor()
  {

    $data['queryResult'] = array();

    $keywords = $this->input->get('src');

		$keyword = explode(' ', $keywords);

		$countKeyword = (integer)count($keyword) - 1;

    $mentor = '';

    for ($i=0; $i <= $countKeyword  ; $i++) {

      $mentor .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i < $countKeyword) {

				$mentor .= ' OR full_name ';

			}

		}

    $className = '';

    for ($i=0; $i <= $countKeyword  ; $i++) {

      $className .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i < $countKeyword) {

				$className .= ' OR class_name ';

			}

		}

    $data['searchResultMentor'] = $this->db->query("SELECT mentor.*, users.full_name, users.photo FROM mentor RIGHT JOIN users ON mentor.user_id = users.id WHERE mentor.active = 1 AND full_name $mentor OR class_name $className");

    $this->load->view('include/header');
		$this->load->view('search', $data);
		$this->load->view('include/footer');

  }

}
