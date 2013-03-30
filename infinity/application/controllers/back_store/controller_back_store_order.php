<?php
class Controller_back_store_order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('back_store/model_back_store_order');
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
		if($id > $this->model_back_store_order->order_count())
			{
				redirect(base_url('admin/order'));
			}
			//start pagination config
		$config = array();
		$config['base_url'] 			= base_url('admin/order');
		$config['total_rows']			= $this->model_back_store_order->order_count();
		$config['per_page']				= 10;
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
		
		$this->header();
		$view_data['list_all_order'] 		= $this->model_back_store_order->list_all_order($config['per_page'],$id);
		$view_data['paginate_links']		= $this->pagination->create_links();
		$this->load->view('back_store/order',$view_data);
		$this->footer();
	}

	public function order_info($slug = NULL)
	{
		if($slug == NULL)
		{
			return show_404();
		}

			$this->header();
			
			$view_data['list_all_order_status'] = $this->model_back_store_order->get_all_order_status(); 
			$view_data['order_info']	  	    = $this->model_back_store_order->view_order($slug);
			$this->load->view('back_store/view_order',$view_data);
			$this->footer();
	}

	public function modify_order_status()
	{
		$ref_id = $this->input->post('order_reference_id');
		$this->form_validation->set_rules('order_status','Order Status','required|trim|xss_clean');
		// if the form passed the rules
		if($this->form_validation->run() ===  TRUE)
		{
			
			/** 
			*modify_product function
			*@return BOOLEAN
			*/

			//it will validate if the user is registered into the system
			$results = $this->model_back_store_order->modify_order($ref_id);
			if($results === TRUE)
			{
				//if the user is registered,it will redirect to customer page
				$message= "<div class='alert alert-success'><i class='icon-exclamation-sign'></i>You have successfully modified this order status</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/order/info/'.$this->input->post('order_reference_id')));
			}else{
				//if not. it will throw an error
				$message= "<div class='alert alert-error'><i class='icon-exclamation-sign'></i>Failed to modify this order status</div>";
				$this->session->set_flashdata('message', $message);
				redirect(base_url('admin/order/info'.$this->input->post('order_reference_id')));
			}
		}else
		{
			//if the form does not passed the rules.it will go back to the login page
			$this->order_info($this->input->post('order_reference_id'));
		}
	}


}