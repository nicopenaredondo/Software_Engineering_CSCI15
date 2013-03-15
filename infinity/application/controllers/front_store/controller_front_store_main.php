<?php
class Controller_front_store_main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function main()
	{
		$this->load->view('view_front_store/index');
	}

	public function about_us()
	{
		$this->load->view('website/about_us');
	}
}
