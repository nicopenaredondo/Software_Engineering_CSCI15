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
		//start pagination config
			$config = array();
			$config['base_url'] 				= base_url('admin/customer');
			$config['total_rows']				= $this->model_back_store_customer->customer_count();
			$config['per_page']					= 3;
			//$config['uri_segment']		= 3;
			$config['full_tag_open'] 		= '<div class="pagination paginat"><ul>';
			$config['full_tag_close']		= '</ul></div>';
			$config['prev_tag_open'] 		= '<li>';
			$config['prev_tag_close']		= '</li>';
			$config['cur_tag_open'] 		= '<li class="active"><a>';
			$config['cur_tag_close'] 		= '</li></a>';
			$config['num_tag_open'] 		= '<li>';
			$config['num_tag_close'] 		= '</li>';
			$config['next_tag_open'] 		= '<li>';
			$config['next_tag_close']		= '</li>';
			$config['last_tag_open'] 		= '<li>';
			$config['last_tag_close']		= '</li>';
			$config['first_tag_open'] 	= '<li>';
			$config['first_tag_close']  = '</li>';

		$this->pagination->initialize($config);
		$this->header();
		$view_data['list_all_customer'] 	= $this->model_back_store_customer->list_all_users($config['per_page'],$id);
		$view_data['paginate_links']			= $this->pagination->create_links();
		$this->load->view('back_store/customer',$view_data);
		$this->footer();
	
	}

	public function customer_info($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

		$this->header();
		$view_data['customer_information']	=	$this->model_back_store_customer->view_user($slug);
		$this->load->view('back_store/view_customer',$view_data);
		$this->footer();
	}




	public function add_customer()
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

	public function modify_customer_account()
	{
		

		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('current_password','Current Password','required|xss_clean|trim|callback_check_valid_password');
		$this->form_validation->set_rules('password','New Password','required|xss_clean|trim');
		$this->form_validation->set_rules('reenter_password','Confirm Password','required|xss_clean|trim|matches[password]');
		$this->form_validation->set_rules('email','Email','required|xss_clean|trim|email');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_user function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_customer->modify_user_account();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully this user account </div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer/'.$this->input->post('user_id')));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this account. Please try again later</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index($this->input->post('user_id'));
		}
	}

	public function modify_customer_profile()
	{
		

		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('first_name','First Name','required|xss_clean|trim');
		$this->form_validation->set_rules('last_name','Last Name','required|xss_clean|trim');
		$this->form_validation->set_rules('address','Address','required|xss_clean|trim');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_user function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_customer->modify_user_profile();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified this user profile </div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer/'.$this->input->post('user_id')));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this account. Please try again later</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('admin/customer'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index($this->input->post('user_id'));
		}
	}

	public function delete_customer($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

		$result = $this->model_back_store_customer->delete_user($slug);

		if($result == TRUE)
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-success">Successfully deleted a customer</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/customer'));
			}else
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-danger"><i class="icon-ok"></i>Failed to delete a customer</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/customer'));
			}
	}

	/**
	*
	*
	* CALLBACKS!!
	* @return boolean 
	*
	*/

	public function check_valid_password($password)
	{
		$result = $this->model_back_store_customer->check_valid_password($password);
		if($result === TRUE)
		{
			return true;
		}
			$this->form_validation->set_message('check_valid_password', 'Your Current Password is wrong"');
			return false;
	}
}