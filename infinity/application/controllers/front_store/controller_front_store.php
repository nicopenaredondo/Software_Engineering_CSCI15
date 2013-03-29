<?php

class Controller_front_store extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('front_store/demo/index');
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

	public function my_account()
	{ 
		$this->header();
		$this->load->view('front_store/customer/index');
		$this->footer();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}