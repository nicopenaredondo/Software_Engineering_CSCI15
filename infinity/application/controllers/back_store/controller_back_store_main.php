<?php
class Controller_back_store_main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	private function header($attr = NULL)
	{
	$header_data['attr'] = $attr;
	$this->load->view('template/header',$header_data);
	}

	private function footer($attr = NULL)
	{
	$footer_data['attr'] = $attr;
	$this->load->view('template/footer',$footer_data);
	}

	public function index()
	{
		$this->header();
		$this->load->view('view_back_store/dashboard');
		$this->footer();
		/*
		if($this->is_logged_in == TRUE)
		{
			$this->load->view('back_store/home');
		}else{
			$this->load->view('back_store/login');
		}
		*/
	}

	public function dashboard()
	{
		$this->load->view('template/header');
		$this->load->view('view_back_store/dashboard');
		$this->load->view('template/footer');
	}

}