<?php 
class Controller_front_store_my_account extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_customer');
		$this->load->model('back_store/model_back_store_product');
	}

	private function is_logged_in()
	{
		$login 		  = $this->session->userdata('logged_in');
		$account_type = $this->session->userdata('account_type');

		if($login === FALSE || $account_type != 'customer')
		{
			return show_404();
		} 
	}

	private function header($title = NULL)
	{
	$header_data['category_list']  = $this->model_back_store_product->list_all_category();
	$header_data['title'] 		   = $title;
	$this->load->view('template/front_store/header',$header_data);
	}


	private function footer($attr = NULL)
	{
	$footer_data['title'] = 'My Account';
	$this->load->view('template/front_store/footer',$footer_data);
	}

	public function my_account_details()
	{
		$this->header();
		$view_data['customer_information'] = $this->model_back_store_customer->view_user($this->session->userdata('id'));
		$this->load->view('front_store/customer/my_account_details',$view_data);
		$this->footer();
	}

	public function modify_user_profile()
	{
		$user_id = $this->session->userdata('id');
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
			$results = $this->model_back_store_customer->modify_user_profile($user_id);
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified this user profile </div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('my-account'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this account. Please try again later</div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('my-account'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->my_account_details();
		}
	}

	public function modify_user_account()
	{
		
		$user_id = $this->session->userdata('id');
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
			$results = $this->model_back_store_customer->modify_user_account($user_id);
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully this user account </div>";
				$this->session->set_flashdata('message', $message);
				 redirect(base_url('my-account'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this account. Please try again later</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('my-account'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->my_account_details();
		}
	}



}