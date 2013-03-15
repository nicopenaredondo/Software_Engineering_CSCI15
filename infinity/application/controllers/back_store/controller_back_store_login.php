<?php /*
class Controller_back_store_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('back_store/model_back_store_login');
	}

	public function index($msg = NULL)
	{
		$view_data['message'] = $msg;
		$this->load->view('view_back_store/login',$view_data);
	}
	//process

	public function process()
	{
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');

		if($this->form_validation->run() === FALSE)
		{
			$this->index();
		}else{
			$result = $this->model_back_store_login->process();
			if($result === TRUE)
			{
				redirect(base_url('admin/'))
			}
		}
	}

	//logout
}