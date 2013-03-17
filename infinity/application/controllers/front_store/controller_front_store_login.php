<?php
class Controller_front_store_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load all the models! \m/
		$this->load->model('front_store/model_front_store_login');
	}

	public function index($message = NULL)
	{
		$view_data['message'] = $message;
		$this->header();
		$this->load->view('view_front_store/login',$view_data);
		$this->footer();
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

	public function login()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			//it will validate if the user is registered into the system
			$results = $this->model_front_store_login->validate();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$account_type = $this->session->userdata('account_type');
				if($account_type == 'customer')
				{
					redirect(base_url(''));
				}elseif($account_type == 'administrator')
				{
					redirect(base_url('admin'));
				}
			}else{
				//if not. it will throw an error
				$error = "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Invalid Username/Password</div>";
				$this->session->set_flashdata('message', $error);
				 redirect(base_url('auth'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index();
		}
	}

	public function logout()
	{
		$this->session->session_destroy();
		redirect(base_url(''));
	}
}