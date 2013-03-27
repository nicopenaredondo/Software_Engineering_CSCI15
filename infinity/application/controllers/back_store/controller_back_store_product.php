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
		//if theres no id in the url show all the list of the customer
		if($id == NULL)
		{
		$this->header();
		$view_data['list_all_products'] 	= $this->model_back_store_product->list_all_products();
		$this->load->view('back_store/product',$view_data);
		$this->footer();
		}else
		{
		$this->header();
		$view_data['list_all_category']	  = $this->model_back_store_product->list_all_category();
		$view_data['product_information']	= $this->model_back_store_product->view_product($id);
		$this->load->view('back_store/view_product',$view_data);
		$this->footer();
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
			*add_user function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_product->modify_product();
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified this product</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/product/'.$this->input->post('product_id')));
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
}