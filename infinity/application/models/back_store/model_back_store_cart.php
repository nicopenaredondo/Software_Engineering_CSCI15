<?php
class Model_back_store_cart extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function view_cart()
	{
		$this->load->view('front_store/cart');
	}
	public function add_cart($slug)
	{
		$this->db->select('*')
				 ->from('product')
				 ->where('product_slug',$slug);
		$result = $this->db->get();
		$row 	= $result->row();
		$data = array(
               'id'      => $row->product_id,
               'qty'     => $this->input->post('product_quantity'),
               'price'   => (integer) $row->product_price,
               'name'    => (string) $row->product_name,
               'options' => array()
            );
		print_r($data);
		$this->cart->product_name_rules = '[:print:]';
		$this->cart->insert($data);

	}
	public function modify_cart()
	{

	}
	public function reset_cart()
	{
		$this->cart->destroy();
	}
}
