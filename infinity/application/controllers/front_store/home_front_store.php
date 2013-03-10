<?php

class Home_front_store extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$this->load->view('website/index');
	}
}