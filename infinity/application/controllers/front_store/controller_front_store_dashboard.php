<?php
class Controller_front_store_dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_customer');
		$this->load->model('back_store/model_back_store_product');
	}

	private function is_logged_in()
	{
		$login 		  = $this->session->userdata('logged_in');
		$account_type = $this->session->userdata('account_type');

		if($login === FALSE || $account_type != 'customer')
		{
			return show_404();
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

	
	public function dashboard()
	{ 
		$this->header();
		$this->load->view('front_store/customer/index');
		$this->footer();
	}


}