<?php
class Controller_back_store_product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
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
			if($id > $this->model_back_store_product->product_count())
			{
				redirect(base_url('admin/product'));
			}
			//start pagination config
			$config = array();
			$config['base_url'] 			= base_url('admin/product');
			$config['total_rows']			= $this->model_back_store_product->product_count();
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
			$view_data['list_all_products'] 		= $this->model_back_store_product->list_all_products($config['per_page'],$id);
			$view_data['paginate_links']			= $this->pagination->create_links();
			$this->load->view('back_store/product',$view_data);
			$this->footer();
		
	}

	public function product_info($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

			$this->header();
			$view_data['list_all_category']	  = $this->model_back_store_product->list_all_category();
			$view_data['product_information']	= $this->model_back_store_product->view_product($slug);
			$this->load->view('back_store/view_product',$view_data);
			$this->footer();
	}

	public function add_product()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('product_name','Product Name','required|trim|xss_clean');
		$this->form_validation->set_rules('product_description','Product Description','required|trim|xss_clean');
		$this->form_validation->set_rules('product_price','Product Price','required|trim|xss_clean|integer');
		$this->form_validation->set_rules('product_stock_quantity','Product Quantity','required|trim|xss_clean|integer');
		$this->form_validation->set_rules('category_id','Product Category','required|trim|xss_clean|integer');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*add_product function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_product->add_product();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully added a product<br>
				<a href='../product' class='btn btn-warning'>Go to Product page ?</a>
				</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/product/add-new-product'));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to add a product</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/product/add-new-product'));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->add_new_product_page();
		}
	}



	public function modify_product()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->form_validation->set_rules('product_name','Product Name','required|trim|xss_clean');
		$this->form_validation->set_rules('product_description','Product Description','required|trim|xss_clean');
		$this->form_validation->set_rules('product_price','Product Price','required|trim|xss_clean|integer');
		$this->form_validation->set_rules('product_stock_quantity','Product Quantity','required|trim|xss_clean|integer');
		$this->form_validation->set_rules('category_id','Product Category','required|trim|xss_clean|integer');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_product function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_product->modify_product();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified this product</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/product/info/'.$this->input->post('product_id')));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this product</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/product/'.$this->input->post('product_id')));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->index($this->input->post('product_id'));
		}
	}

	public function delete_product($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}
			/** 
			*delete_product function
			*@param  id
			*@return BOOLEAN
			*/
		$result = $this->model_back_store_product->delete_product($slug);

		if($result == TRUE)
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-success"><i class="icon-ok"></i>Successfully deleted a product</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/product'));
			}else
			{
				$msg = '<div style="margin-top:5px;margin-bottom:5px;"class="alert alert-danger"><i class="icon-remove"></i>Failed to delete a product</div>';
				$this->session->set_flashdata('message',$msg);
				redirect(base_url('admin/product'));
			}
	}

	/**
	*
	*
	*KUNG ANO ANONG FUNCTIONS! lol
	*
	*
	**/

	public function add_new_product_page()
	{
		$this->header();
		$view_data['list_all_category'] = $this->model_back_store_product->list_all_category();
		$this->load->view('back_store/add_new_product_page',$view_data);
		$this->footer();
	}

}