<?php
class Holiday extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		
		$this->data['holidays'] = $this->db->get('tbl_holidays')->result();
		$this->data['subview'] = 'holidays/index';
		$this->load->view('main_layout', $this->data);
	}
}
?>