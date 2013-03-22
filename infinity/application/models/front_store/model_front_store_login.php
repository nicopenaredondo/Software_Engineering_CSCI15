<?php
class Model_front_store_login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	*validate method
	* @return boolean
	*/
	public function validate()
	{
		
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);

		$this->db->select('*')
				   ->from('users')
				   ->where('username',$username)
				   ->where('password',$password);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$data = array(
				'id' 		   => $row->id,
				'username' 	   => $row->username,
				'logged_in'    => TRUE,
				'account_type' => $row->account_type
				);
			$this->session->set_userdata($data);
			return TRUE;
		}
			return FALSE;
	}
}