<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App {

  public function __construct()
  {
    //parent::__construct();
    $this->CI =& get_instance();
  }

  public function sale($price,$sale)
  {
    $percent = ($sale/100) * $price;
    $sale = $price - $percent;
    return $sale;
  }

  public function gettotalprice()
  {
    $datacart = $this->CI->db->where('sid',$_COOKIE['cart'])->get('cart');
    $cart = $datacart->row();
    $countcart = $datacart->num_rows();

    $totalprice = 0;

    if ($countcart > 0) {
      $cart_item = $this->CI->db->where('cart_id', $cart->cart_id)->from('cart_item')->join('mentor_class','mentor_class.mentor_class_id = cart_item.product_id')->get();

      foreach ($cart_item->result() as $key => $value) {
        if ($value->sale == 0) {
          $price = $value->price;
        }else {
          $price = $this->sale($value->price,$value->sale);
        }

        $totalprice = $totalprice + $price;
      }

      return $totalprice;

    }else {

      return $totalprice;

    }

  }

  public function getuser()
  {
    $user = $this->CI->ion_auth->user()->row();
    return $user;
  }

  public function getcart()
  {
    $html = '<div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">';
    if ($this->CI->ion_auth->logged_in()) {

      $user = $this->getuser();

      //$where = array('user_id' => $user->id);
      $where = array('sid' => $_COOKIE['cart']);
    }else {

      $sid = session_id().date('His');

      if (isset($_COOKIE['cart'])) {
  			//$sid = session_id().date('His');
  			//setcookie('cart', $sid, time() + (86400 * 14), "/"); // 86400 = 1 day
        //setcookie('cart', $sid, time() + (86400 * 3), "/"); // 86400 = 1 day

        $where = array('sid' => $_COOKIE['cart']);
  		}else {
        $where = array('sid' => $sid);
      }


    }

    $cart = $this->CI->db->where('checkout',0)->where($where)->get('cart');

    $row = $cart->row();

    $cartItemRow = 0;

    if ($cart->num_rows() > 0) {
      $cartItem = $this->CI->db->where('cart_id',$row->cart_id)->from('cart_item')->join('mentor_class','mentor_class.mentor_class_id=cart_item.product_id')->get();
      $cartItemRow = $cartItem->num_rows();

      $html .= '
        <a href="#" class="header-nav-features-toggle">
          <img src="'.base_url().'images/icons/icon-cart-light.svg" width="14" alt="" class="header-nav-top-icon-img">
          <span class="cart-info">
            <span class="cart-qty">'.$cartItemRow.'</span>
          </span>
        </a>';

      $html .= '
        <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
        <ol class="mini-products-list">';


      if ($cartItemRow > 0) {
        foreach ($cartItem->result() as $key => $value) {
          $html .= '<li class="item">';
          $html .= '<a href="#" title="Camera X1000" class="product-image"><img src="'.base_url('assets/uploads/files/'.$value->poster).'" alt="'.substr($value->poster,0,-4).'"></a>';
          $html .= '
          <div class="product-details">
            <p class="product-name">
              <a href="#">'.$value->title.'</a>
            </p>
          ';

          if ($value->sale == 0) {
            $html .= '
            <p class="qty-price">
               1X <span class="price">Rp. '.number_format($value->price,0,',','.').'</span>
            </p>';
          }else {
            $html .= '
            <p class="qty-price">
               1X <span class="price">Rp. '.number_format($this->sale($value->price,$value->sale),0,',','.').'</span>
            </p>';
          }






          $html .= '<a href="'.site_url('cart/delete/'.$value->cart_id.'/'.$value->product_id).'" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>';
          $html .='</div></li>';

        };
      };

      $html .= '</ol>';

      $html .= '
        <div class="totals">
          <span class="label">Total:</span>
          <span class="price-total"><span class="price">Rp. '.number_format($this->gettotalprice(),0,',','.').',-</span></span>
        </div>
      ';

      $html .='<div class="actions">';
      $html .='<a class="btn btn-dark" href="'.site_url('cart').'">View Cart</a>';

      if ($this->CI->ion_auth->logged_in()) {
        $html .= '<a class="btn btn-primary" href="#">Checkout</a>';
      }else {
        $html .= '<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#defaultModal">Checkout</a>';
      }
      $html .= '</div>';

      $html .= '</div></div>';

      return $html;


    }else {

      $html .= '
        <a href="#" class="header-nav-features-toggle">
          <img src="'.base_url().'images/icons/icon-cart-light.svg" width="14" alt="" class="header-nav-top-icon-img">
          <span class="cart-info">
            <span class="cart-qty">'.$cartItemRow.'</span>
          </span>
        </a>';

      $html .= '
        <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
        <ol class="mini-products-list">';

        $html .= '</ol>';

        $html .= '
          <div class="empty-cart w-100 text-center">
            <i class="fa fa-shopping-basket fa-4x"></i>
            <p class="mb-2">Keranjang belanja kosong</p>
          </div>
        ';

        $html .='<div class="actions">';
        $html .='<a class="btn btn-dark btn-block" href="'.site_url('mentor').'">Lihat Mentor</a>';

        $html .= '</div>';

        $html .= '</div></div>';

      return $html;
    }




  }

}
