<?php
class Model_back_store_order extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	

	public function list_all_order($offset,$limit,$slug = NULL)
	{
		if($slug == NULL)
		{
			/*
			*this is the query that will select order_id,order_reference_id,
			*first_name,last_name,order_status_description,payment_method and order date
			*/
			$this->db->limit($offset,$limit);
			$this->db->select('o.order_id,o.order_reference_id,
							   u_p.first_name,
							   u_p.last_name,
							   o_s.order_status_description,
							   p.payment_method,
							   o.order_date')
							->from('orders AS o')
							->join('user_profiles AS u_p','u_p.user_id = o.customer_id')
							->join('order_status AS o_s','o_s.order_status_id = o.order_status_id')
							->join('payment AS p','p.payment_id = o.payment_id');
			//this will query the statement that we've created above
			$result = $this->db->get();

			//checking if there's a record
			if($result->num_rows() > 0)
			{
			//returns a set of arrays if there are record
				return $result->result_array();
			}
			//return a false if there's no record
				return false;
		}else
		{

			/*
			*this is the query that will select order_id,order_reference_id,
			*first_name,last_name,order_status_description,payment_method and order date
			*/
			$this->db->select('o.order_id,o.order_reference_id,
							   u_p.first_name,
							   u_p.last_name,
							   o_s.order_status_description,
							   p.payment_method,
							   o.order_date')
							->from('orders AS o')
							->join('user_profiles AS u_p','u_p.user_id = o.customer_id')
							->join('order_status AS o_s','o_s.order_status_id = o.order_status_id')
							->join('payment AS p','p.payment_id = o.payment_id')
							->where('u_p.user_id',$slug);
			//this will query the statement that we've created above
			$result = $this->db->get();

			//checking if there's a record
			if($result->num_rows() > 0)
			{
			//returns a set of arrays if there are record
				return $result->result_array();
			}
			//return a false if there's no record
				return false;
		
		}
		
	}

	public function view_order($slug = FALSE)
	{
		//if there's no id it will return an 404
		if($slug === FALSE)
		{
			return show_404();
		}

		/*
		*NOTE : this query is the same as the list_all_order, i've used it again
		*so i can get the info of the specified id 
		*
		*this is the query that will select order_id,order_reference_id,
		*first_name,last_name,order_status_description,payment_method and order date
		*/
		$this->db->select('o.order_id,o.order_reference_id,
						   u_p.first_name,
						   u_p.last_name,
						   o_s.order_status_description,
						   p.payment_method,
						   o.order_date,')
						->from('orders AS o')
						->join('user_profiles AS u_p','u_p.user_id = o.customer_id')
						->join('order_status AS o_s','o_s.order_status_id = o.order_status_id')
						->join('payment AS p','p.payment_id = o.payment_id')
						->where('o.order_reference_id',$slug);

		//this will query the statement that we've created above
		$order_info = $this->db->get();

		//just checking there's a row
		if($order_info->num_rows() == 1)
		{
			//the `view_all_item_order(param)` is an object created in line 81
			//i've separate the function for readability purposes not sure if this is a good
			//programming practice.but it will help me in the future
			$data_array = array('order_info'  => $order_info->row_array(),
					       		  'list_of_products' => $this->view_all_item_order($slug)
													);
			return $data_array;
		}
		return false;
	}

	public function view_all_item_order($slug = FALSE)
	{
		//checking if there's an id returns an error 404 if there's non
		if($slug === FALSE)
		{
			return show_404();
		}
		//this will get the column `product_name`,`product_description`,`product_price`,
		//`category_name`,`product_quantity`
		$this->db->select('product.product_name,
						product.product_price,
						category.category_name,
						order_product.product_quantity')
						 ->from('order_product')
						 ->join('orders','orders.order_id = order_product.order_id')
						 ->join('product','product.product_id = order_product.product_id')
						 ->join('category','category.category_id = product.category_id')
						 ->where('orders.order_reference_id',$slug);
		//this will just query our statements
		$result = $this->db->get();
		//checking there's a row
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function add_order()
	{
		$transaction_id = random_string('numeric', 12);
		$first_name 	= $this->input->post('first_name',TRUE);
		$last_name  	= $this->input->post('last_name',TRUE);
		$address  		= $this->input->post('address',TRUE);
		$mobile  		= $this->input->post('mobile',TRUE);
		$city 		 	= $this->input->post('city',TRUE);
		$zip_code  		= $this->input->post('zip_code',TRUE);
		$country  		= $this->input->post('country',TRUE);
		$payment_method = $this->input->post('payment_method',TRUE);
		$message		= $this->input->post('message',TRUE);

		$billing_array  = array(
			'first_name' => $first_name,
			'last_name'	 => $last_name,
			'address'	 => $last_name,
			'mobile'	 => $mobile,
			'city'		 => $city,
			'zip_code'	 => $zip_code,
			'country'	 => $country,
			);
		$this->db->insert('billing',$billing_array);
		$billing_id = $this->db->insert_id();

		$orders_array   = array(
			'order_reference_id' => $transaction_id,
			'customer_id'		 => $this->session->userdata('id'),
			'order_status_id'	 => 7,
			'payment_id'		 => $payment_method,
			'billing_id'		 => $billing_id,
			'message'			 => $message
			);
		$this->db->insert('orders',$orders_array);
		$order_id = $this->db->insert_id();

		foreach($this->cart->contents() as $product)
		{
			$order_product_array = array(
				'order_id'	=> $order_id,
				'product_id'=> $product['id'],
				'product_quantity'	=> $product['qty']
				);
			$this->db->insert('order_product',$order_product_array);
		}
		return TRUE;
	}

	public function modify_order($slug)
	{
		$ref_id       = $slug;
		$order_status = $this->input->post('order_status');
		$data_array   = array('order_status_id' => $order_status);
		$result 	  = $this->db->update('orders',$data_array,array('order_reference_id'=>$ref_id));
		if($result === TRUE)
		{
			return true;
		}
			return false;
		
	}

	public function delete_order($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		$delete_order 		= $this->db->delete('orders',array('order_id' => $slug));
		$delete_order_items = $this->db->delete('order_product',array('order_id' => $slug));

		if($delete_order === TRUE && $delete_order_items === TRUE)
		{
			return true;
		}
			return false;
	}


	/**
	*
	*
	* KUNG ANO ANONG FUNCTIONS HAHAHA LOL
	*
	*
	**/

	public function order_count()
	{
		return $this->db->count_all('orders');
	}

	public function get_all_order_status()
	{
		$this->db->select('*')->from('order_status');
		$result = $this->db->get();
		return $result->result_array();
	}
}