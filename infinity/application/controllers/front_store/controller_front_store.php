<?php

class Controller_front_store extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('view_front_store/index');
	}
}