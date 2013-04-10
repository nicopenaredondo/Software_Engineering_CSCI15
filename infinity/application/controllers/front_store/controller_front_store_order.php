<?php
class Controller_front_store_order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();	
		$this->load->model('back_store/model_back_store_order');
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

	public function my_orders()
	{
		$user_id = $this->session->userdata('id');
		$this->header();
		$view_data['list_all_order'] = $this->model_back_store_order->list_all_order(NULL,NULL,$user_id);
		$this->load->view('front_store/customer/my_order',$view_data);
		$this->footer();
	}

	public function order_info($slug)
	{
		$this->header();
		$view_data['order_information'] = $this->model_back_store_order->view_order($slug);
		$this->load->view('front_store/customer/order_info',$view_data);
		$this->footer();
	}
}