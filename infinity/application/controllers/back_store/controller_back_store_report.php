<?php
class Controller_back_store_report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('back_store/report');
	}
}