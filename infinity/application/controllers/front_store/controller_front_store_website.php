<?php

class Controller_front_store_website extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_product');
		$this->load->model('back_store/model_back_store_category');
		$this->load->model('back_store/model_back_store_cart');
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

	/**
	*
	* CART SECTION
	*
	*/
	private function check_logged_in()
	{
		if($this->session->userdata('logged_in') === FALSE)
		{
			$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>You need to login in order to proceed with this action</div>";
			$this->session->set_flashdata('message', $message);
			redirect(base_url('auth/login'));
		}
	}
	public function checkout()
	{
		$this->header('Checkout');
		$this->load->view('front_store/cart');
		$this->footer();
	}

	public function add_cart($slug = NULL)
	{
		//user needs to be logged in before he/she can add to the cart
		$this->check_logged_in();
		if($slug == NULL)
		{
			return show_404();
		}

		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('product_quantity','Product Quantity','required|trim|integer|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			$message= "<div class='alert alert-info'><i class='icon-check'></i>Successfully added to your cart</div>";
			$this->session->set_flashdata('message', $message);
			$this->model_back_store_cart->add_cart($slug);
			redirect(base_url($this->input->post('current_url')));
		}else{
			$message= "<div class='alert alert-error'><i class='icon-exclamation-sign' style='padding-right:4px;'></i>Failed to add the product</div>";
			$this->session->set_flashdata('message', $message);
			redirect(base_url($this->input->post('current_url')));
		}

	}
	
	public function modify_cart()
	{
		$this->check_logged_in();
		if($slug == NULL)
		{
			return show_404();
		}
		$result = $this->model_back_store_cart->modify_cart();
		if($result == TRUE)
		{
			$message= "<div class='alert alert-info'><i class='icon-check'></i>Successfully modified your cart</div>";
			$this->session->set_flashdata('message', $message);
			redirect(base_url('cart/checkout'));
		}else{
			$message= "<div class='alert alert-error'><i class='icon-exclamation-sign' style='padding-right:4px;'></i>Failed to modified your cart</div>";
			$this->session->set_flashdata('message', $message);
			redirect(base_url('cart/checkout'));
		}


	}
	public function reset_cart()
	{
		$this->model_back_store_cart->reset_cart();
		redirect(base_url());
	}
	
}