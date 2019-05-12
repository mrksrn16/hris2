<?php
class Transactions extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['transactions'] = $this->db->get('tbl_transactions')->result();
		$this->data['subview'] = 'transactions/index';
		$this->load->view('main_layout', $this->data);
	}
}
?>