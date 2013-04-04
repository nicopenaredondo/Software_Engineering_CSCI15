<?php
class Model_back_store_blog extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_blog($offset,$limit)
	{
		$this->db->limit($offset,$limit);
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

		if(is_numeric($slug))
		{
		$this->db->select('*')->from('blog')
							->where('blog_id',$slug);
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->row_array();
		}
			return show_404();
		}else{
			$this->db->select('*')->from('blog')
								->where('blog_slug',$slug);
			$result = $this->db->get();
			if($result->num_rows() > 0)
			{
				return $result->row_array();
			}
				return show_404();
		}
	}

	public function add_blog()
	{
		$blog_title			=	$this->input->post('blog_title',TRUE);
		$blog_description	=	$this->input->post('blog_content',TRUE);
		$blog_slug			=	url_title($this->input->post('blog_slug'),'dash',TRUE);
		$blog_tags			=	$this->input->post('blog_tags',TRUE);

		$data_array = array(
			'blog_title'	=>	$blog_title,
			'blog_content'	=>	$blog_description,
			'blog_slug'		=>	$blog_slug,
			'blog_tags'		=>	$blog_tags
			);

		$result = $this->db->insert('blog',$data_array);
		if($result ===	TRUE)
		{
			return true;
		}
			return false;
	}

	public function modify_blog()
	{
		
		$blog_id			= 	$this->input->post('blog_id',TRUE);
		$blog_title			=	$this->input->post('blog_title',TRUE);
		$blog_content		=	$this->input->post('blog_content',TRUE);
		$blog_tags			=	$this->input->post('blog_tags',TRUE);
		$blog_slug			=	url_title($this->input->post('blog_slug'),'dash',TRUE);

		$data_array = array(
			'blog_title'		=>	$blog_title,
			'blog_content'		=>	$blog_content,
			'blog_tags'			=>	$blog_tags,
			'blog_slug'			=>	$blog_slug
			);

		$result = $this->db->update('blog',$data_array,array('blog_id'	=>	$blog_id));
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

		$result = $this->db->delete('blog',array('blog_slug' => $slug));
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

	public function blog_count()
	{
		return $this->db->count_all('blog');
	}

	public function check_slug($slug)
	{
		$this->db->select('blog_slug')
				 ->from('blog')
				 ->where('blog_slug',$slug);
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
		$this->db->select('blog_id')
				 ->from('blog')
				 ->where('blog_slug',$slug);
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