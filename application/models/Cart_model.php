<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function cost($destination,$weight,$courier)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://api.rajaongkir.com/starter/cost");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "origin=114&destination=".$destination."&weight=".$weight."&courier=".$courier);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('key: e4fc80495fec47c0d8990e58b6c98273'));

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output,true);
  }

  public function address($id = '')
  {
    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $id = $user->id;
      return $this->db->where('user_id',$id)->get('users');
    }

  }

}
