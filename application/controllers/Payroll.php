<?php
class Payroll extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['employees'] = $this->db->get('tbl_employee_details')->result();
		$this->data['subview'] = 'payroll/index';
		$this->load->view('main_layout', $this->data);
	}
	public function view($id){
		$check_position = $this->M_User->get_employee_details($id);
		$emp_position = $check_position->position;
		$this->db->where('position', $emp_position);
		$benefit = $this->db->get('tbl_benefits')->row();
		$this->data['benefit'] = $benefit;
		$this->data['total_deductions'] = (int)$benefit->sss + (int)$benefit->philhealth + (int)$benefit->pagibig;
		$where_bonus = "employee_id='$id' and isPaid = 'not-paid'";
		$this->db->where($where_bonus);
		$this->data['fringe'] = $this->db->get('tbl_bonus')->result();
		$where_bonus = "employee_id='$id' and isPaid = 'not-paid'";
		$this->db->select_sum('amount')->where($where_bonus);
		$query = $this->db->get('tbl_bonus')->result();
		$total_bonus = $query[0]->amount;
		$this->data['total_bonus'] = $total_bonus;
		$this->data['employee_id'] = $id;
		$where = "employee_id='$id' and status='not-paid'";
		$this->db->where($where);
		$this->data['employee_attendance'] = $this->db->get('tbl_attendance')->result();
		$this->db->where($where);
		$this->data['total_number_of_days'] = $this->db->count_all_results('tbl_attendance');
		$this->data['subview'] = 'payroll/view';
		$this->load->view('main_layout', $this->data);
	}
	public function paid($emp_id){
		//save to transaction
		$data = array(
			'employee_id' => $emp_id,
			'date' => date('Y-m-d'),
			'total_salary' => $this->input->post('total_salary'),
			'total_deduction' => $this->input->post('total_deduction'),
			'total_bonus' => $this->input->post('total_bonus'),
			'salary' => $this->input->post('salary')
			);
		$this->db->insert('tbl_transactions', $data);
		// //update attendance
		$status = array(
			'status' => 'paid'
			);
		$this->db->where('employee_id', $emp_id);
		$this->db->update('tbl_attendance', $status);
		redirect('payroll');
	}
	
}
?>