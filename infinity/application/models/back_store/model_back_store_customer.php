<?php 
class Model_back_store_customer extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list_all_users($offset,$limit)
	{	
		$this->db->limit($offset,$limit);
		$this->db->select('users.id,users.username,user_profiles.first_name,user_profiles.last_name')
						 ->from('users')
						 ->join('user_profiles','user_profiles.user_id = users.id','left')
						 ->where('account_type','customer');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}
			return false;
	}

	public function view_user($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$this->db->select('users.id,users.username,users.password,users.email,
						user_profiles.first_name,user_profiles.last_name,user_profiles.address,
						user_profiles.zip_code,user_profiles.city,user_profiles.telephone,
						user_profiles.mobile,user_profiles.country,user_profiles.website')
						 ->from('users')
						 ->join('user_profiles','user_profiles.user_id = users.id','left')
						 ->where('users.id',$slug);

		$result = $this->db->get();
		if($result->num_rows() == 1)
		{
			return $result->row_array();
		}
			return show_404();
	}

	public function add_user()
	{
		//FOR TABLE `USER`
		$username 			= $this->input->post('username',TRUE);
		$password 			= $this->input->post('password',TRUE);
		$email	  			= $this->input->post('email'   ,TRUE);
		$account_type		= 'customer';
		$hasProfile			= FALSE;

		$data_user 			= array(
				'username'		=>	$username,
				'password'		=>	$password,
				'email'			=>	$email,
				'account_type'	=>	$account_type,
				'hasProfile'	=> 	$hasProfile
				);
		
		$result  = $this->db->insert('users',$data_user);

		$result2 = $this->db->insert('user_profiles',array('user_id'=>$this->db->insert_id()));
		if($result === TRUE && $result2 === TRUE)
		{
			return TRUE;
		}
			return FALSE;
	}

	public function modify_user_account($id = NULL )
	{
		if($id == NULL)
		{
			$user_id 	= $this->input->post('user_id',TRUE);
		}else
		{
			$user_id 	= $id;
		}
		
		
		$password 	= $this->input->post('password',TRUE);
		$email	  	= $this->input->post('email'   ,TRUE);
		
		$data_user 			= array(
				'password'		=>	$password,
				'email'			=>	$email,
				);

		$this->db->where('id',$user_id);
		$result = $this->db->update('users',$data_user);

		if($result === TRUE)
			{
				return true;
			}
				return false;
	}

	public function modify_user_profile($id = NULL)
	{
		if($id == NULL)
		{
			$user_id 	= $this->input->post('user_id',TRUE);
		}else
		{
			$user_id 	= $id;
		}
		
		$first_name	    = $this->input->post('first_name',TRUE);
		$last_name		= $this->input->post('last_name' ,TRUE);
		$address		= $this->input->post('address'	 ,TRUE);
		$zip_code		= $this->input->post('zip_code'	 ,TRUE);
		$city			= $this->input->post('city'		 ,TRUE);
		$telephone	 	= $this->input->post('telephone' ,TRUE);
		$mobile	 		= $this->input->post('mobile' ,TRUE);
		$country		= $this->input->post('country'	 ,TRUE);
		$website		= $this->input->post('website'	 ,TRUE);
	
		$data_user_profile = array(
				'first_name'		=>	$first_name,
				'last_name'			=>	$last_name,
				'address'			=>	$address,
				'zip_code'			=>	$zip_code,
				'city'				=>	$city,
				'telephone'			=>	$telephone,
				'mobile'			=>  $mobile,
				'country'			=>	$country,
				'website'			=>	$website	
				);
		$this->db->where('user_id',$user_id);
		$result = $this->db->update('user_profiles',$data_user_profile);

		if($result === TRUE)
		{
			return true;
		}
			return false;
	}

	public function delete_user($slug = FALSE)
	{
		if($slug === FALSE)
		{
			return show_404();
		}

		$delete_user 			= $this->db->delete('users',array('id'=> $slug));
		$delete_user_profile	= $this->db->delete('user_profiles',array('user_id' => $slug));
		
		if($delete_user === TRUE && $delete_user_profile === TRUE)
		{
			return true;
		}
			return false;
	}

	public function check_valid_password($password)
	{
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			return true;
		}
			return false;
	}

	public function customer_count()
	{
		$this->db->select('id')
				->from('users')
				->where('account_type','customer');
		$result = $this->db->get();
		return $result->num_rows();
	}



}