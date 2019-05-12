<?php
class Bonus extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['employees'] = $this->db->get('tbl_employee_details')->result();
		$this->data['subview'] = 'bonus/index';
		$this->load->view('main_layout', $this->data);
	}
	public function view($id){
		$this->data['employee_id'] = $id;
		$where = "employee_id='$id' and isPaid='not-paid'";
		$this->db->where($where);
		$this->data['employee_bonus'] = $this->db->get('tbl_bonus')->result();
		$this->data['subview'] = 'bonus/view';
		$this->load->view('main_layout', $this->data);
	}
	public function add($id){
		$data = array(
				'employee_id' => $id,
				'amount' => $this->input->post('bonus_amount'),
				'notes' => $this->input->post('notes'),
				'date' => date('Y-m-d')
			);
		$this->db->insert('tbl_bonus',$data);
		redirect('bonus/view/'.$id);
	}
	public function get_bonus($id)
	{
		$this->db->where('id', $id);
		$bonus = $this->db->get('tbl_bonus')->row();
		echo json_encode($bonus);	
	}
	public function update_bonus()
	{
		$data = array(
			'amount' => $this->input->post('bonus_amount'),
			'notes' => $this->input->post('bonus_notes'),
			'date' => date('Y-m-d')
		);
		$this->db->where('id', $this->input->post('bonus_id'));
		$this->db->update('tbl_bonus',$data);
		redirect('bonus/view/'.$this->input->post('employee_id'));
	}
	public function delete_bonus($id,$employee_id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('tbl_bonus');
		redirect('bonus/view/'.$employee_id);
	}
}
?>