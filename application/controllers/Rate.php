<?php
class Rate extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['rates'] = $this->db->get('tbl_employee_rate')->result();
		$this->data['subview'] = 'rate/index';
		$this->load->view('main_layout', $this->data);
	}
	public function get_rate($id){
		$this->db->where('id', $id);
		$data = $this->db->get('tbl_employee_rate')->row();
		echo json_encode($data);
	}
	public function update_rate($id){
		$data = array(
				'rate' => $this->input->post('rate')
			);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update('tbl_employee_rate', $data);
		redirect('rate');
	}
	public function add_rate(){
		$data = array(
				'rate' => $this->input->post('rate'),
				'position' => $this->input->post('position')
			);
		$this->db->insert('tbl_employee_rate', $data);
		redirect('rate');
	}
}
?>