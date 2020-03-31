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

		$countKeyword = count($keyword);

		for ($i=0; $i < $countKeyword  ; $i++) {
			$like .= 'LIKE \'%'.$keyword[$i].'%\' ESCAPE \'!\' ';

			if ($i - 1) {
				$like .= ' OR title ';
			}

		}

		//echo $like;

		$data['queryResult'] = $this->db->query("SELECT * FROM mentor_class WHERE title $like");

		//print_r($data['queryResult']->result_array());


    $this->load->view('include/header');
		$this->load->view('search', $data);
		$this->load->view('include/footer');
  }

}
