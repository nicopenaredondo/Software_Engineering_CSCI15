<?php
class Controller_front_store_main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_customer');
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

	private function header($attr = NULL)
	{
	$header_data['attr'] = $attr;
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

	public function my_orders()
	{
		$this->header();
		$this->load->view('front_store/customer/my_order');
		$this->footer();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}