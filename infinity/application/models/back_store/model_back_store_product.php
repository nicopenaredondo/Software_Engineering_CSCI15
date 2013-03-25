<?php
class Model_back_store_product extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function list_all_products()
	{
		$this->db->select('*')
				->from('product')
				->join('category','category.category_id = product.category_id');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_product($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('*')
						 ->from('product')
						 ->join('category','category.category_id = product.category_id');
						 ->where('product.product_id',$slug);

		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
			return false;
	}

	public function add_product()
	{
		$category_id  	     	= $this->input->post('category_id',TRUE);
		$product_name 		 	= $this->input->post('product_name',TRUE);
		$product_description 	= $this->input->post('product_description',TRUE);
		$product_price		 	= $this->input->post('product_price',TRUE);
		$product_stock_quantity = $this->input->post('product_stock_quantity',TRUE);
		
		$data_array = array(
			'category_id' 			=>	$category_id,
			'product_name'			=>	$product_name,
			'product_description'	=>	$product_description,
			'product_price'			=>	$product_price,
			'product_stock_quantity'=>	$product_stock_quantity
			);

		$result = $this->db->insert('product',$data_array);
		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function modify_product($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$category_id  	     	= $this->input->post('category_id',TRUE);
		$product_name 		 	= $this->input->post('product_name',TRUE);
		$product_description 	= $this->input->post('product_description',TRUE);
		$product_price		 	= $this->input->post('product_price',TRUE);
		$product_stock_quantity = $this->input->post('product_stock_quantity',TRUE);
		
		$data_array = array(
			'category_id' 			=>	$category_id,
			'product_name'			=>	$product_name,
			'product_description'	=>	$product_description,
			'product_price'			=>	$product_price,
			'product_stock_quantity'=>	$product_stock_quantity
			);
		//for more info abou Active Record class please see the documentation
		$result = $this->db->update('product',$data_array,array('product_id' => $slug));

		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function delete_product($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$result = $this->db->delete('product',array('product_id' => $slug));
		if($result === TRUE)
		{
			return true;
		}
			return false;
	}
}