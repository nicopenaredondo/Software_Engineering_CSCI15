<?php
class Controller_back_store_customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_customer');
	}

	private function is_logged_in()
	{
		$login 		  = $this->session->userdata('logged_in');
		$account_type = $this->session->userdata('account_type');

		if($login === FALSE || $account_type != 'administrator')
		{
			return show_404();
		} 
	}

	private function header($attr = NULL)
	{
	$header_data['attr'] = $attr;
	$this->load->view('template/back_store/header',$header_data);
	}

	private function footer($attr = NULL)
	{
	$footer_data['attr'] = $attr;
	$this->load->view('template/back_store/footer',$footer_data);
	}

	public function index($id = NULL)
	{
		//if theres no id in the url show all the list of the customer
		if($id == NULL)
		{
		$this->header();
		$view_data['list_all_customer'] 		= $this->model_back_store_customer->list_all_users();
		$this->load->view('back_store/customer',$view_data);
		$this->footer();
		}else
		{
		$this->header();
		$view_data['customer_information']	=	$this->model_back_store_customer->view_user($id);
		$this->load->view('back_store/view_customer',$view_data);
		$this->footer();
		}
	}


	public function add_user()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('email_address','Email Address','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*add_user function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_customer->add_user();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>Registration Success</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Registration Failed</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index();
		}
	}

	public function modify_user()
	{
		

		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('email_address','Email Address','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_user function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_customer->modify_user($slug);
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>Registration Success</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Registration Failed</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index();
		}
	}

	public function delete_user($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

		$result = $this->model_back_store_customer->delete_user($slug);

		if($result == TRUE)
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-success">Successfully deleted a category</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/customer'));
			}else
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-danger"><i class="icon-ok"></i>Failed to delete the category</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/customer'));
			}
	}
}