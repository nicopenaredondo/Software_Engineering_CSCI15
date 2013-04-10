<?php
class Controller_back_store_category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_category');
		$this->load->model('back_store/model_back_store_product');
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
			if($id > $this->model_back_store_category->category_count())
			{
				redirect(base_url('admin/category'));
			}
			//start pagination config
			$config = array();
			$config['base_url'] 			= base_url('admin/category');
			$config['total_rows']			= $this->model_back_store_category->category_count();
			$config['per_page']				= 5;
			//$config['uri_segment']		= 3;
			$config['full_tag_open'] 	= '<div class="pagination paginat"><ul>';
			$config['full_tag_close']	= '</ul></div>';
			$config['prev_tag_open'] 	= '<li>';
			$config['prev_tag_close'] 	= '</li>';
			$config['cur_tag_open'] 	= '<li class="active"><a>';
			$config['cur_tag_close'] 	= '</li></a>';
			$config['num_tag_open'] 	= '<li>';
			$config['num_tag_close'] 	= '</li>';
			$config['next_tag_open'] 	= '<li>';
			$config['next_tag_close'] 	= '</li>';
			$config['last_tag_open'] 	= '<li>';
			$config['last_tag_close']	= '</li>';
			$config['first_tag_open'] 	= '<li>';
			$config['first_tag_close']  = '</li>';

			$this->pagination->initialize($config);
			//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
			//end pagination config
			$this->header();
			$view_data['list_all_category'] 		= $this->model_back_store_category->list_all_category($config['per_page'],$id);
			$view_data['paginate_links']			= $this->pagination->create_links();
			$this->load->view('back_store/category',$view_data);
			$this->footer();
		
	}

	public function category_info($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

			$this->header();
			$view_data['list_of_products']		= $this->model_back_store_product->list_all_products_by_category($slug);
			$view_data['category_information']	= $this->model_back_store_category->view_category($slug);
			$this->load->view('back_store/view_category',$view_data);
			$this->footer();
	}

	public function add_category()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('category_name','Category Name','required|trim|xss_clean');
		$this->form_validation->set_rules('category_description','Category Description','required|trim|xss_clean');
		$this->form_validation->set_rules('category_slug','Category Slug','required|trim|xss_clean||callback_modified_slug_validation');
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*add_category function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_category->add_category();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully added a category</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/category/add-new-category'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to add a category</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/category/add-new-category'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->add_new_category_page();
		}
	}
	
	public function modify_category()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('category_name','Category Name','required|trim|xss_clean');
		$this->form_validation->set_rules('category_description','Category Description','required|trim|xss_clean');
		$this->form_validation->set_rules('category_slug','Category Slug','required|trim|xss_clean|callback_modified_slug_validation');
		
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*add_category function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_category->modify_category();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modify this category</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/category/info/'.url_title($this->input->post('category_slug'),'dash',TRUE)));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this category</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/category/info/'.url_title($this->input->post('category_slug'),'dash',TRUE)));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->category_info($this->input->post('category_id'));
		}
	}

	public function delete_category($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}
			/** 
			*delete_category function
			*@param  id
			*@return BOOLEAN
			*/
		$result = $this->model_back_store_category->delete_category($slug);

		if($result == TRUE)
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-success"><i class="icon-ok"></i>Successfully deleted a category</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/category'));
			}else
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-danger"><i class="icon-remove"></i>Failed to delete a category. Maybe you have a product under it ?</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/category'));
			}
	}

	/**
	*
	*
	*KUNG ANO ANONG FUNCTIONS! lol
	*
	*
	**/

	public function add_new_category_page()
	{
		$this->header();
		$this->load->view('back_store/add_new_category_page');
		$this->footer();
	}

	public function slug_validation($slug)
	{
		$result = $this->model_back_store_category->check_slug($slug);
		if($result === TRUE)
		{
			return true;
		}
			$this->form_validation->set_message('slug_validation', 'The slug is already taken.Please choose another one');
			return false;
	}

	public function modified_slug_validation($slug)
	{
		$result = $this->model_back_store_category->modified_check_slug($slug);
		if($result === TRUE)
		{
			return true;
		}
		//if no modification in the slug has been made. this will be the logic
		if($slug == $this->input->post('hidden_slug'))
		{
			return true;
		}else{
			$this->form_validation->set_message('modified_slug_validation', 'The slug is already taken.Please choose another one');
			return false;
		}
	}


}