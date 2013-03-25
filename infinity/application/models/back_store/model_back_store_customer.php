<?php 
class Model_back_store_customer extends CI
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_users()
	{
		$this->db->select('*')
						 ->from('users')
						 ->where('account_type','customer');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_user($slug = FALSE);
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('*')
						 ->from('users')
						 ->join('user_profiles','user_profiles.user_id = users.id')
						 ->where('users.id',$slug);

		$result = $this->db->get();
		if($result->num_rows() == 1)
		{
			return $result->row_array();
		}
			return false;
	}

	public function modify_user($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		//FOR TABLE `USER`
		$username 			= $this->input->post('username',TRUE);
		$password 			= $this->input->post('password',TRUE);
		$email	  			= $this->input->post('email'   ,TRUE);
		$account_type		= 'customer';
		$hasProfile			= FALSE;

		$data_user 			= array(
				'username'		=>	$username,
				'password'		=>	$password,
				'email'				=>	$email,
				'account_type'=>	$account_type,
				'hasProfile'	=> 	$hasProfile
				);

		$this->db->where('id',$slug);
		$result = $this->db->update('users',$data_user);

		if($result === TRUE)
			{
				return true;
			}
				return false;
	}

	public function modify_user_profiles($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}
		$first_name	    = $this->input->post('first_name',TRUE);
		$last_name			= $this->input->post('last_name' ,TRUE);
		$company 				= $this->input->post('company'   ,TRUE);
		$address				= $this->input->post('address'	 ,TRUE);
		$address2				= $this->input->post('address2'	 ,TRUE);
		$zip_code				= $this->input->post('zip_code'	 ,TRUE);
		$city						= $this->input->post('city'		 	 ,TRUE);
		$telephone	 		= $this->input->post('telephone' ,TRUE);
		$country				= $this->input->post('country'	 ,TRUE);
		$website				= $this->input->post('website'	 ,TRUE);
	
		$data_user_profile = array(
							'first_name'		=>	$first_name,
							'last_name'			=>	$last_name,
							'company'				=>	$company,
							'address'				=>	$address,
							'address2'			=>	$address2,
							'zip_code'			=>	$zip_code,
							'city'					=>	$city,
							'telephone'			=>	$telephone,
							'country'				=>	$country,
							'website'				=>	$website	
							);
		$this->db->where('user_id',$slug);
		$result = $this->db->update('user_profiles',$data_user_profile);

		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function delete_customer($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$delete_user 					= $this->db->delete('users',array('id'=> $slug));
		$delete_user_profile	= $this->db->delete('user_profiles',array('user_id' => $slug));
		if($delete_user === TRUE && $delete_user_profile === TRUE)
		{
			return true;
		}
			return false;
	}

}