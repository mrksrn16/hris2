<?php
class Benefits extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['benefits'] = $this->db->get('tbl_benefits')->result();
		$this->data['subview'] = 'benefits/index';
		$this->load->view('main_layout', $this->data);
	}
	public function get_benefits($id){
		$this->db->where('id', $id);
		$data = $this->db->get('tbl_benefits')->row();
		echo json_encode($data);
	}
	public function update_benefit(){
		$data = array(
			'sss' => $this->input->post('sss'),
			'philhealth' => $this->input->post('philhealth'),
			'pagibig' => $this->input->post('pagibig'),
			'tax' => $this->input->post('tax'),
			);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update('tbl_benefits', $data);
		redirect('benefits');
	}
}
?>