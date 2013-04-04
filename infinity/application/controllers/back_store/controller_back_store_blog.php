<?php
class Controller_back_store_blog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_blog');
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
			if($id > $this->model_back_store_blog->blog_count())
			{
				redirect(base_url('admin/blog'));
			}
			//start pagination config
			$config = array();
			$config['base_url'] 			= base_url('admin/blog');
			$config['total_rows']			= $this->model_back_store_blog->blog_count();
			$config['per_page']				= 3;
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
			$view_data['list_all_blog'] 			= $this->model_back_store_blog->list_all_blog($config['per_page'],$id);
			$view_data['paginate_links']			= $this->pagination->create_links();
			$this->load->view('back_store/blog',$view_data);
			$this->footer();
	}

	public function blog_info($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

			$this->header();
			$view_data['blog_information']	= $this->model_back_store_blog->view_blog($slug);
			$this->load->view('back_store/view_blog',$view_data);
			$this->footer();
	}

	public function add_blog()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('blog_title','Blog Title','required|trim|xss_clean');
		$this->form_validation->set_rules('blog_content','Blog Content','required|trim|xss_clean');
		$this->form_validation->set_rules('blog_slug','Blog Slug','required|trim|xss_clean|callback_slug_validation');
		$this->form_validation->set_rules('blog_tags','Tags','trim|xss_clean');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*add_blog function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_blog->add_blog();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully added a blog</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/blog/add-new-blog'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to add a blog</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/blog/add-new-blog'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->add_new_blog_page();
		}
	}

	public function modify_blog()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('blog_title','Blog Title','required|trim|xss_clean');
		$this->form_validation->set_rules('blog_content','Blog Content','required|trim|xss_clean');
		$this->form_validation->set_rules('blog_slug','Blog Slug','required|trim|xss_clean|callback_modified_slug_validation');
		$this->form_validation->set_rules('blog_tags','Tags','trim|xss_clean');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_blog function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_blog->modify_blog();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified a blog</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/blog/info/'.url_title($this->input->post('blog_slug'),'dash',TRUE)));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modified a blog</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/blog/info/'.url_title($this->input->post('blog_slug'),'dash',TRUE)));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->blog_info($this->input->post('blog_id'));
		}
	}

	public function delete_blog($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}
			/** 
			*delete_blog function
			*@param  id
			*@return BOOLEAN
			*/
		$result = $this->model_back_store_blog->delete_blog($slug);

		if($result == TRUE)
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-success"><i class="icon-ok"></i>Successfully deleted a blog</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/blog'));
			}else
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-danger"><i class="icon-remove"></i>Failed to delete a blog</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/blog'));
			}
	}

	/**
	*
	*
	*KUNG ANO ANONG FUNCTIONS! lol
	*
	*
	**/

	public function add_new_blog_page()
	{
		$this->header();
		$this->load->view('back_store/add_new_blog_page');
		$this->footer();
	}

	public function slug_validation($slug)
	{
		$result = $this->model_back_store_blog->check_slug($slug);
		if($result === TRUE)
		{
			return true;
		}
			$this->form_validation->set_message('slug_validation', 'The slug is already taken.Please choose another one');
			return false;
	}

	public function modified_slug_validation($slug)
	{
		$result = $this->model_back_store_blog->modified_check_slug($slug);
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