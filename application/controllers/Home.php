<?php
class Home extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		
		$this->data['employees'] = $this->db->get('tbl_employee_details')->result();
		$this->data['subview'] = 'dashboard';
		$this->load->view('main_layout', $this->data);
	}
}
?>