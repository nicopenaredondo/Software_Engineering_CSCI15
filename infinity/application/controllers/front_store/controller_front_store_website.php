<?php

class Controller_front_store_website extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_customer');
	}


	private function header($attr = NULL)
	{
	$header_data['title'] = 'Infinity Webshop';
	$this->load->view('template/front_store/header',$header_data);
	}

	private function footer($attr = NULL)
	{
	$footer_data['attr'] = $attr;
	$this->load->view('template/front_store/footer',$footer_data);
	}

	public function index()
	{
		$this->header();
		$this->load->view('front_store/index');
		$this->footer();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}