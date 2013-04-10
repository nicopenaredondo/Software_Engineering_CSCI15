<?php

class Controller_front_store_website extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_product');
	}


	private function header($title = NULL)
	{
	$header_data['category_list']  = $this->model_back_store_product->list_all_category();
	$header_data['title'] 		   = $title;
	$this->load->view('template/front_store/header',$header_data);
	}

	private function footer($attr = NULL)
	{
	$footer_data['attr'] = $attr;
	$this->load->view('template/front_store/footer',$footer_data);
	}

	public function index()
	{
		$view_data['list_products'] = $this->model_back_store_product->list_all_products(0,10);
		$this->header('Infinity Webshop');
		$this->load->view('front_store/index',$view_data);
		$this->footer();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

	public function product_list($category = NULL,$product = NULL)
	{	
		if($category == NULL)
		{
			$view_data['category_list']	   = $this->model_back_store_product->list_all_category();
			$view_data['list_products']    = $this->model_back_store_product->list_all_products(0,10);
			$this->header();
			$this->load->view('front_store/product_list',$view_data);
			$this->footer();
		}elseif($product != NULL)
		{
			$view_data['category_list']	   = $this->model_back_store_product->list_all_category();
			$view_data['list_products']    = $this->model_back_store_product->list_all_products(0,10);
			$view_data['product_info']	   = $this->model_back_store_product->view_product($product);
			$this->header();
			$this->load->view('front_store/product_information',$view_data);
			$this->footer();
		}else
		{
			$view_data['category_list']	   = $this->model_back_store_product->list_all_category();
			$view_data['list_products']    = $this->model_back_store_product->list_all_products(0,10);
			$view_data['list_of_products'] = $this->model_back_store_product->list_all_products_by_category($category);
			$this->header();
			$this->load->view('front_store/product_list_by_category',$view_data);
			$this->footer();
		}
	}
	
}