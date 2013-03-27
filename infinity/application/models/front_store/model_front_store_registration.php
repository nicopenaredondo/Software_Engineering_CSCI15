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
		$username 			= $this->input->post('username',TRUE);
		$password 			= $this->input->post('password',TRUE);
		$email	  			= $this->input->post('email_address'   ,TRUE);
		$account_type		= 'customer';
		$hasProfile			= FALSE;

		$data_user 			= array(
				'username'		=>	$username,
				'password'		=>	$password,
				'email'			=>	$email,
				'account_type'	=>	$account_type,
				'hasProfile'	=> 	$hasProfile
				);
		
		$result = $this->db->insert('users',$data_user);

		$result2 = $this->db->insert('user_profiles',array('user_id'=>$this->db->insert_id()));
		if($result === TRUE && $result2 === TRUE)
		{
			return TRUE;
		}
			return FALSE;
	}
}