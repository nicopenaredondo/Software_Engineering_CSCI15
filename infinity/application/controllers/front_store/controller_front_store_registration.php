<?php
class Controller_front_store_registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('front_store/model_front_store_registration');
	}

	public function index($message = NULL)
	{
		$view_data['message'] = $message;
		$this->header();
		$this->load->view('view_front_store/registration',$view_data);
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

	public function register()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('email_address','Email Address','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*register function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_front_store_registration->register();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Registration Failed</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('auth/register'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Registration Failed</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('auth/register'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index();
		}
	}

	
	
}