<?php
class Model_back_store_content extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_blog()
	{
		$this->db->select('*')->from('blog');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_blog($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('*')->from('blog');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
			return false;
	}

	public function add_blog()
	{
		$blog_title			=	$this->input->post('blog_title',TRUE);
		$blog_description	=	$this->input->post('blog_description',TRUE);
		$blog_date			=	$this->input->post('blog_data',TRUE);
		$blog_tags			=	$this->input->post('blog_tags',TRUE);

		$data_array = array(
			'blog_title'	=>	$blog_title,
			'blog_description'	=>	$blog_description,
			'blog_date'		=>	$blog_date,
			'blog_tags'		=>	$blog_tags
			);

		$result = $this->db->insert('blog',$data_array);
		if($result ===	TRUE)
		{
			return true;
		}
			return false;
	}

	public function modify_blog($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$blog_title			=	$this->input->post('blog_title',TRUE);
		$blog_description	=	$this->input->post('blog_description',TRUE);
		$blog_date			=	$this->input->post('blog_data',TRUE);
		$blog_tags			=	$this->input->post('blog_tags',TRUE);

		$data_array = array(
			'blog_title'	=>	$blog_title,
			'blog_description'	=>	$blog_description,
			'blog_date'		=>	$blog_date,
			'blog_tags'		=>	$blog_tags
			);

		$result = $this->db->update('blog',$data_array,array('blog_id'	=>	$slug));
		if($result ===	TRUE)
		{
			return true;
		}
			return false;
	}

	public function delete_blog($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$result = $this->db->delete('blog',array('blog_id' => $slug));
		if($result === TRUE)
		{
			return true;
		}
			return false;
	}
}