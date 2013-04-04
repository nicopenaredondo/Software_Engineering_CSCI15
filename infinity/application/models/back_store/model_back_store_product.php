<?php
class Model_back_store_product extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function list_all_products($offset,$limit)
	{
		$this->db->limit($offset,$limit);

		$this->db->select('product.product_id,
						product.product_name,
						product.product_slug,
						product.product_price,
						category.category_name')
				->from('product')
				->join('category','category.category_id = product.category_id','left');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function list_all_category()
	{
		$this->db->select('*')->from('category');
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

		if(is_numeric($slug))
		{
		$this->db->select('*')->from('product')
							->where('product_id',$slug);
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
			return show_404();
		}else{
			$this->db->select('*')->from('product')
								->where('product_slug',$slug);
			$result = $this->db->get();
			if($result->num_rows() > 0)
			{
				return $result->row_array();
			}
				return show_404();
		}
	}

	public function add_product()
	{
		$category_id  	     	= $this->input->post('category_id',TRUE);
		$product_name 		 	= $this->input->post('product_name',TRUE);
		$product_description 	= $this->input->post('product_description',TRUE);
		$product_slug		 	= url_title($this->input->post('product_slug'),'dash',TRUE);
		$product_price		 	= $this->input->post('product_price',TRUE);
		$product_stock_quantity = $this->input->post('product_stock_quantity',TRUE);
		
		$data_array = array(
			'category_id' 			=>	$category_id,
			'product_name'			=>	$product_name,
			'product_description'	=>	$product_description,
			'product_slug'			=> 	$product_slug,
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

	public function modify_product()
	{
		
		$product_id				= $this->input->post('product_id',TRUE);
		$category_id  	     	= $this->input->post('category_id',TRUE);
		$product_name 		 	= $this->input->post('product_name',TRUE);
		$product_description 	= $this->input->post('product_description',TRUE);
		$product_slug		 	= url_title($this->input->post('product_slug'),'dash',TRUE);
		$product_price		 	= $this->input->post('product_price',TRUE);
		$product_stock_quantity = $this->input->post('product_stock_quantity',TRUE);
		
		$data_array = array(
			'category_id' 			=>	$category_id,
			'product_name'			=>	$product_name,
			'product_description'	=>	$product_description,
			'product_slug'			=>	$product_slug,
			'product_price'			=>	$product_price,
			'product_stock_quantity'=>	$product_stock_quantity
			);
		//for more info abou Active Record class please see the documentation
		$result = $this->db->update('product',$data_array,array('product_id' => $product_id));

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

		$result = $this->db->delete('product',array('product_slug' => $slug));
		if($result === TRUE)
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

	public function product_count()
	{
		return $this->db->count_all('product');
	}

	public function check_slug($slug)
	{
		$this->db->select('product_slug')
				 ->from('product')
				 ->where('product_slug',$slug);
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			//if theres an already a slug return false
			return false;
		}
			//but if not return true;
			return true;
	}

	public function modified_check_slug($slug)
	{
		$this->db->select('product_id')
				 ->from('product')
				 ->where('product_slug',$slug);
		$result = $this->db->get();
		if($result->num_rows() >= 1)
		{
			//if theres an already a slug return false
			return false;
		}
			//but if not return true;
			return true;
	}
}