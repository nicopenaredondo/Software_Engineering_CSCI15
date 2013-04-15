<?php
class Model_front_store_registration extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/** 
	*register function
	*@return BOOLEAN
	*/

	public function register()
	{
		//FOR TABLE `USER`
		$first_name			= $this->input->post('first_name',TRUE);
		$last_name			= $this->input->post('last_name',TRUE);
		$username 			= $this->input->post('username',TRUE);
		$password 			= $this->input->post('password',TRUE);
		$email	  			= $this->input->post('email_address'   ,TRUE);
		$account_type		= 'customer';
		$hasProfile			= FALSE;

		$data_user 			= array(
				'username'		=>	$username,
				'password'		=>	$this->encrypt->sha1($password),
				'email'			=>	$email,
				'account_type'	=>	$account_type,
				'hasProfile'	=> 	$hasProfile
				);
		
		$result = $this->db->insert('users',$data_user);

		$data_profile = array(
			'user_id'  	=> $this->db->insert_id(),
			'first_name'=> $first_name,
			'last_name'	=> $last_name
			);
		$result2 = $this->db->insert('user_profiles',$data_profile);
		if($result === TRUE && $result2 === TRUE)
		{
			return TRUE;
		}
			return FALSE;
	}

	public function username_check($username)
	{
		$this->db->select('*')
				 ->from('users')
				 ->where('username',$username);
		$result = $this->db->get();
		if($result->num_rows() == 1)
		{
			return true;
		}
			return false;
	}
}