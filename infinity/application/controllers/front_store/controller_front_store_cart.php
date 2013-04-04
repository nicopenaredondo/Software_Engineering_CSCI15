<?php
class Controller_front_store_cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_cart');
	}
	

	public function view_cart()
	{
		$this->load->view('front_store/cart');
	}
	public function add_cart()
	{
		$this->model_back_store_cart->add_cart();
	}
	public function modify_cart(){}
	public function reset_cart(){}
}