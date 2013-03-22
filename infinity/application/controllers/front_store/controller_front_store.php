<?php

class Controller_front_store extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('front_store/index');
	}

	public function my_account()
	{ 
		$this->load->view('front_store/customer/index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}