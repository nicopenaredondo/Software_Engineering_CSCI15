<?php

class Controller_front_store_website extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_product');
		$this->load->model('back_store/model_back_store_category');
		$this->load->model('back_store/model_back_store_cart');
		$this->load->model('back_store/model_back_store_customer');
		$this->load->model('back_store/model_back_store_order');
	}

	private function check_logged_in()
	{
		if($this->session->userdata('logged_in') === FALSE)
		{
			$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>You need to login in order to proceed with this action</div>";
			$this->session->set_flashdata('message', $message);
			redirect(base_url('auth/login'));
		}
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
			//check if the category is valid 
			$check = $this->model_back_store_category->check_category($category);
			if($check === TRUE)
			{
				$view_data['category_list']	   = $this->model_back_store_product->list_all_category();
				$view_data['list_products']    = $this->model_back_store_product->list_all_products(0,10);
				$view_data['list_of_products'] = $this->model_back_store_product->list_all_products_by_category($category);
				$this->header();
				$this->load->view('front_store/product_list_by_category',$view_data);
				$this->footer();
			}else
			{
				//if category is not in the database show 404
				return show_404();
			}
		}
	}

	public function checkout()
	{
		$this->check_logged_in();
		$this->header('Checkout');
		$view_data['customer_information'] = $this->model_back_store_customer->view_user($this->session->userdata('id'));
		$this->load->view('front_store/checkout',$view_data);
		$this->footer();
	}

	public function checkout_process()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('first_name','First Name','required|trim');
		$this->form_validation->set_rules('last_name','Last Name','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('mobile','Mobile','required|trim|integer');
		$this->form_validation->set_rules('city','City','required|trim');
		$this->form_validation->set_rules('zip_code','Zip Code','required|trim|integer');
		$this->form_validation->set_rules('country','Country','required|trim');
		$this->form_validation->set_rules('payment_method','Payment','required|trim');
		if($this->form_validation->run() == TRUE)
		{
			$result = $this->model_back_store_order->add_order();
			if($result == TRUE)
				{
					$message= "<div class='alert alert-info'><i class='icon-check'></i>Your Transaction is successfull. Wait for 24 hours for confirmation. Thank You</div>";
					$this->session->set_flashdata('message', $message);
					$this->cart->destroy();
					redirect(base_url('my-order'));
				}
		}{
			$this->checkout();
		}
	}

	public function checkout_process_complete()
	{
		$this->header('Transaction Complete');
		$this->load->view('front_store/checkout_process_complete');
		$this->footer();
	}



	
}