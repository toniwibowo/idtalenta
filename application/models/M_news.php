<?php

class M_news extends CI_Model  {

	function __construct()
    {
        parent::__construct();
    }

	function view()
	{
		$sekarangL = date("Y-n-d");
		$string_query       = "select * from news where posting_date <= now() order by posting_date desc";
	  	$query          	  = $this->db->query($string_query);
	  	$config['base_url']     = base_url().'news/view';
	  	$config['total_rows']   = $query->num_rows();
	  	$config['per_page']     = '12';
			$config['full_tag_open'] = '<ul class=pagination>';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#" ><b>';
			$config['cur_tag_close'] = '</b></a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['attributes'] = array('class' => 'page-link');
	  	$num            = $config['per_page'];
		$config['uri_segment'] = 3;
	  	$offset         = $this->uri->segment(3);
	  	$offset         = ( ! is_numeric($offset) || $offset < 1) ? 0 : $offset;
	  	if(empty($offset))
	  	{
	  	$offset=0;
	  	}
	  	$this->pagination->initialize($config);
	  	$data['query']      = $this->db->query($string_query." limit $offset,$num");
	  	$data['base']       = $this->config->item('base_url');
		$data['jlh'] = $query->num_rows();
	  	return $data;
	}
}
?>
