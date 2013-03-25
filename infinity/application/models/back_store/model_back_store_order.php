<?php
class Model_back_store_order extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_order()
	{
		$this->db->select('o.order_id,o.order_reference_id,
						   CONCAT(u_p.first_name," ",u_p.last_name),
						   o_s.order_status_description,
						   p.payment_method,
						   o.order_date')
						->from('orders AS o')
						->join('user_profiles AS u_p','u_p.user_id = o.customer_id')
						->join('order_status AS o_s','o_s.order_status_id = o.order_status_id')
						->join('payment AS p','p.payment_id = o.payment_id');

		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_order($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('o.order_id,o.order_reference_id,
						   CONCAT(u_p.first_name," ",u_p.last_name),
						   o_s.order_status_description,
						   p.payment_method,
						   o.order_date,')
						->from('orders AS o')
						->join('user_profiles AS u_p','u_p.user_id = o.customer_id')
						->join('order_status AS o_s','o_s.order_status_id = o.order_status_id')
						->join('payment AS p','p.payment_id = o.payment_id');
						->where('o.order_id',$slug);

		$order_info = $this->db->get();
		if($order_info->num_rows() == 1)
		{
			$data_array = array('order_info' 			 => $order_info->row_array(),
													'list_of_products' => $this->view_all_item_order($slug)
												);
			return $data_array;
		}
		return false;
	}

	public function view_all_item_order($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('product.product_name',
							'product.product_description',
							'product.product_price',
							'category.category_name',
							'order_product.product_quantity')
						 ->from('order_product')
						 ->join('product','product.product_id = order_product.product_id')
						 ->join('category','category.category_id = product.category_id')
						 ->where('order_product.order_id',$slug);
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function modify_order($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		//modify the order status or the payment id
	}

	public function delete_order($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		$delete_order 			= $this->db->delete('orders',array('order_id' => $slug));
		$delete_order_items = $this->db->delete('order_product',array('order_id' => $slug));

		if($delete_order === TRUE && $delete_order_items === TRUE)
		{
			return true;
		}
			return false;
	}
}