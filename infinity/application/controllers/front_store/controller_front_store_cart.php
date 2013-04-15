<?php
class Controller_front_store_cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_cart');
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
		$this->model_back_store_cart->modify_cart();
		$message= "<div class='alert alert-info'><i class='icon-check'></i>Successfully modified your cart</div>";
		$this->session->set_flashdata('message', $message);
		redirect(base_url('cart/checkout'));
	}
	public function reset_cart()
	{
		$this->model_back_store_cart->reset_cart();
		redirect(base_url());
	}

	public function delete_product_cart($row_id = NULL)
	{
		if($row_id == NULL)
		{
			return show_404();
		}
		$result = $this->model_back_store_cart->delete_product_cart($row_id);
		$message= "<div class='alert alert-info'><i class='icon-check'></i>Successfully remove the product from your cart</div>";
		$this->session->set_flashdata('message', $message);
		redirect(base_url('cart/checkout'));

	}
}