<?php
class Controller_back_store_main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function main()
	{
		$this->load->view('view_back_store/index');
	}
}