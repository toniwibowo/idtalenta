<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    date_default_timezone_set("Asia/Jakarta");

    $this->load->model('cart_model','cart');
    $this->load->model('member_model','member');
    $this->load->library('app');

    if (!isset($_COOKIE['cart'])) {
			$sid = session_id().date('His');
			//setcookie('cart', $sid, time() + (86400 * 14), "/"); // 86400 = 1 day
      setcookie('cart', $sid, time() + (86400 * 3), "/"); // 86400 = 1 day
		}
  }

  function index()
  {
    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      //$this->db->where('user_id',$user->id);
      $this->db->where('sid',$_COOKIE['cart']);
    }else {
      if (isset($_COOKIE['cart'])) {
        $this->db->where('sid',$_COOKIE['cart']);
      }
    }

    $this->db->where('checkout',0);
    $data['mainCart'] = $this->db->get('cart');
    $data['d'] = $data['mainCart']->row();

    $data['cartItem'] = $this->db->where('cart_id',$data['d']->cart_id)->from('cart_item')->join('mentor_class','mentor_class.mentor_class_id=cart_item.product_id')->get();

    $data['queryProvince'] = $this->member->province();

    $this->load->view('include/header');
    $this->load->view('cart',$data);
    $this->load->view('include/footer');
  }

  public function addtocart()
  {

    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $user_id = $user->id;
    }else {
      $user_id = 0;
    }

    $cekinvoice = $this->db->get('cart');

    if ($cekinvoice->num_rows() > 0) {
      $str = $this->db->insert_id() - 1;
      $get = $this->db->order_by('cart_id','desc')->get('cart')->row();

      $invoice = $get->invoice + 1;

    }else {
      $invoice = 4010;
    }

    $product_id = $this->input->post('product_id',true);
    $qty = $this->input->post('qty',true);
    $sid = $_COOKIE['cart'];
    $ip_address = $this->input->ip_address();
    $orderDate = date('Ymd');
    $orderTime = date('His');
    $uniq_code = rand(100,1000);

    // CHECK CART
    $checkcart = $this->db->where('sid', $sid)->get('cart');

    if ($checkcart->num_rows() > 0) {

      $getcartid = $this->db->where('sid',$sid)->order_by('cart_id','desc')->get('cart')->row();

      // CHECK DUPLICATE PRODUCT IN CART ITEM WITH THE SAME SID

      $checkproductcartitem = $this->db->where('product_id',$product_id)->where('cart_id',$getcartid->cart_id)->get('cart_item');
      $item = $checkproductcartitem->row();

      if ($checkproductcartitem->num_rows() > 0) {
        $cartitem = array(
          'qty' => $item->qty + $qty,
          'order_date' => $orderDate,
          'order_time' => $orderTime
        );

        $this->db->where('cart_id',$getcartid->cart_id)->set($cartitem)->update('cart_item');
      }else {
        $cartitem = array(
          'cart_id' => $getcartid->cart_id,
          'product_id' => $product_id,
          'qty' => $qty,
          'order_date' => $orderDate,
          'order_time' => $orderTime
        );

        $this->db->insert('cart_item',$cartitem);
      }

    }else {
      $data = array(
        'invoice' => $invoice,
        'user_id' => $user_id,
        'sid' => $sid,
        'ip_address' => $ip_address,
        'order_date' => $orderDate,
        'order_time' => $orderTime,
        'uniq_code' => $uniq_code
      );

      $insertcart = $this->db->insert('cart',$data);

      if ($insertcart) {
        $cartitem = array(
          'cart_id' => $this->db->insert_id(),
          'product_id' => $product_id,
          'qty' => $qty,
          'order_date' => $orderDate,
          'order_time' => $orderTime
        );

        $this->db->insert('cart_item',$cartitem);

      }

    }

    //UPDATE TOTAL PRICE

    $total = $this->app->gettotalprice();

    $this->db->where('sid',$_COOKIE['cart'])->set('total',$total)->update('cart');

    redirect('cart');
  }

  public function updatecart()
  {
    $qty = $this->input->post('qty',true);
    $product_id = $this->input->post('product_id',true);
    $cart_id = $this->input->post('cart_id',true);
    $dataAction = $this->input->post('data_action',true);
    $orderDate = date('Ymd');
    $orderTime = date('His');

    $dataupdate = array(
      'qty' => $qty,
      'order_date' => $orderDate,
      'order_time' => $orderTime
    );

    $updatecart = $this->db->where('cart_id',$cart_id)->where('product_id',$product_id)->set($dataupdate)->update('cart_item');

    if ($updatecart) {
      echo 1;
    }else {
      echo 0;
    }
  }

  public function updateongkir()
  {
    $courier    = $this->input->post('courier',true);
    $address    = $this->input->post('address',true);
    $province   = $this->input->post('province',true);
    $city       = $this->input->post('city',true);
    $postalcode = $this->input->post('postal_code',true);

    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $user_id = $user->id;

      $data = array(
        'user_id' => $user_id,
        'province_id' => $province,
        'city_id' => $city,
        'postal_code' => $postalcode,
        'description' => $address,
        'sid' => 0
      );

      if ($this->cart->address()->num_rows() > 0) {
        $this->db->where('user_id',$user_id)->set($data)->update('address');
      }else {
        $this->db->insert('address',$data);
      }

    }else {
      $sid = $_COOKIE['cart'];

      $data = array(
        'user_id' => 0,
        'province_id' => $province,
        'city_id' => $city,
        'postal_code' => $postalcode,
        'description' => $address,
        'sid' => $sid
      );

      if ($this->cart->address()->num_rows() > 0) {
        $this->db->where('sid',$sid)->set($data)->update('address');
      }else {
        $this->db->insert('address',$data);
      }

    }

    $dataongkir = $this->cart->cost($city,1200,$courier);

    foreach ($dataongkir['rajaongkir']['results'] as $key => $value) {
      foreach ($value['costs'] as $key => $row) {
        if ($key == 0) {
          $service = $row['service'];
        }
        foreach ($row['cost'] as $num => $pr) {
          if ($key == 0) {
            $ongkir = $pr['value'];
          }
        }
      }
    }

    $dataCourier = array('courier' => $courier, 'service' => $service, 'cost' => $ongkir);

    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $cart = $this->db->where('user_id',$user->id)->where('checkout',0)->order_by('cart_id','desc')->get('cart')->row();

      $this->db->where('user_id',$user->id)->where('checkout',0)->where('cart_id',$cart->cart_id)->set($dataCourier)->update('cart');
    }else {
      $this->db->where('sid',$_COOKIE['cart'])->set($dataCourier)->update('cart');
    }

    redirect('cart');

  }

  public function updatecourir()
  {
    $dataInput = explode(',',$this->input->post('courier',true));

    $data = array(
      'courier' => $dataInput[0],
      'service' => $dataInput[1],
      'cost' => $dataInput[2]
    );

    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $cart = $this->db->where('user_id',$user->id)->where('checkout',0)->order_by('cart_id','desc')->get('cart')->row();

      $updatecart = $this->db->where('user_id',$user->id)->where('cart_id',$cart->cart_id)->set($data)->update('cart');
    }else {
      $updatecart = $this->db->where('sid',$_COOKIE['cart'])->set($data)->update('cart');
    }

    if ($updatecart) {
      echo 1;
    }else {
      echo 2;
    }

  }

  public function delete($cart_id,$product_id)
  {
    $this->db->where('cart_id',$cart_id)->where('product_id',$product_id)->delete('cart_item');
    redirect('cart');
  }

  public function testing()
  {
    $cost = $this->cart->cost(151,1700,'jne');

    $ong = $cost['rajaongkir']['results'];

    $user = $this->ion_auth->user()->row();
    $cart = $this->db->where('user_id',$user->id)->where('checkout',0)->order_by('cart_id','desc')->get('cart')->row();

    echo $cart->cart_id;
  }

}
