<?php
class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$this->load->view('website/index');
	}

	public function about_us()
	{
		$this->load->view('website/about_us');
	}
}
