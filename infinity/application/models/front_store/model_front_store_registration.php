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
		$username = $this->input->post('username',TRUE);
		$email		 = $this->input->post('email_address',TRUE);
		$password = $this->input->post('password',TRUE);

		$data = array(
			'username' => $username,
			'email'		 => $email,
			'password'	 => $password,
			'account_type' => 'customer',
			'hasProfile'	 => 0
			);
		$result = $this->db->insert('users',$data);
		if($result === TRUE)
		{
			return TRUE;
		}
			return FALSE;
	}
}