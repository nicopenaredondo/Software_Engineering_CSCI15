<?php
class Model_back_store_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_category($offset,$limit)
	{
		$this->db->limit($offset,$limit);
		$this->db->select('*')->from('category');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_category($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		if(is_numeric($slug))
		{
		$this->db->select('*')->from('category')
							->where('category_id',$slug);
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
			return show_404();
		}else{
			$this->db->select('*')->from('category')
								->where('category_slug',$slug);
			$result = $this->db->get();
			if($result->num_rows() > 0)
			{
				return $result->row_array();
			}
				return show_404();
		}
	}

	public function add_category()
	{
		$category_name 		 	= $this->input->post('category_name',TRUE);
		$category_description 	= $this->input->post('category_description',TRUE);
		$category_slug 			= url_title($this->input->post('category_slug'),'dash',TRUE);
		$data_array = array(
			'category_name'			=>	$category_name,
			'category_description'	=>	$category_description,
			'category_slug'			=>  $category_slug
			);

		$result = $this->db->insert('category',$data_array);
		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function modify_category()
	{
		
		$category_id			= $this->input->post('category_id',TRUE);
		$category_name 		 	= $this->input->post('category_name',TRUE);
		$category_description 	= $this->input->post('category_description',TRUE);
		$category_slug 			= url_title($this->input->post('category_slug'),'dash',TRUE);
		$data_array = array(
			'category_name'			=>	$category_name,
			'category_description'	=>	$category_description,
			'category_slug'			=>  $category_slug
			);

		//for more info abou Active Record class please see the documentation
		$result = $this->db->update('category',$data_array,array('category_id' => $category_id));

		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function delete_category($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$result = $this->db->delete('category',array('category_slug' => $slug));
		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function category_count()
	{
		return $this->db->count_all('category');
	}

	public function check_slug($slug)
	{
		$this->db->select('category_slug')
				 ->from('category')
				 ->where('category_slug',$slug);
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
		$this->db->select('category_slug')
				 ->from('category')
				 ->where('category_slug',$slug);
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