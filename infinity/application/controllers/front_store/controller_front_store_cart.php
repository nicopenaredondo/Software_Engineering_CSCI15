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
	public function add_cart($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('product_quantity','Product Quantity','trim|integer|xss_clean');
		if($this->form_validation->run() === TRUE)
		{
			$this->model_back_store_cart->add_cart($slug);
		}else
		{
			$this->view_cart();
		}
	}
	public function modify_cart($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('product_quantity','Product Quantity','trim|integer|xss_clean');
		if($this->form_validation->run() === TRUE)
		{
			$this->model_back_store_cart->modify_cart($slug);
		}else
		{
			$this->view_cart();
		}
	}
	public function reset_cart()
	{
		$this->model_back_store_cart->reset_cart();
		redirect(base_url());
	}
}