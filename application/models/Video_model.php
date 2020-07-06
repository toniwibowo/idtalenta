<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('cookie');
  }

  public function get_class_by_id($id)
  {
    return $this->db->where('mentor_class_id', $id)->get('mentor_class')->row();
  }

  public function check_log_hits($id)
  {

    $ip = $this->input->ip_address();

    $date = date('Y-m-d');

    $check = $this->db->where('mentor_class_id', $id)->where('ip_address', $ip)->where('view_date', $date)->get('log_class_view');

    if ($check->num_rows() == 0) {
      return true;
    }

  }

  public function update_hits($id)
  {
    if ($this->check_log_hits($id)) {

      $data['ip_address']       = $this->input->ip_address();
      $data['view_date']        = date('Y-m-d');
      $data['mentor_class_id']  = $id;

      if ($this->ion_auth->logged_in()) {
        $user = $this->ion_auth->user()->row();
        $data['user_id'] = $user->id;
      }else {
        $data['user_id'] = 0;
      }

      $dataLogView = $this->db->where('mentor_class_id', $id)->where('view_date', date('Y-m-d'))->where('ip_address', $data['ip_address'])->get('log_class_view');

      if ($dataLogView->num_rows() < 1) {
        $insertlog = $this->db->insert('log_class_view', $data);
      }

      if ($insertlog) {

        $hit = $this->get_class_by_id($id)->hits + 1;

        $this->db->where('mentor_class_id', $id)->set('hits', $hit)->update('mentor_class');
      }

    }

    return false;
  }

}
