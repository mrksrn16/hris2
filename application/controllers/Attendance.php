<?php
class Attendance extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['employees'] = $this->db->get('tbl_employee_details')->result();
		$this->data['subview'] = 'attendance/index';
		$this->load->view('main_layout', $this->data);
	}
	public function add($id){
		$data = array(
			'employee_id' => $id,
			'time_in' => date('h:i:s'),
			'date' => date('Y-m-d'),
			'status' => 'not-paid',
			);
		$this->db->insert('tbl_attendance',$data);
		redirect('home');
	}
	public function out($attendance_id){
		$data = array(
			'time_out' => date('h:i:s'),
			);
		$this->db->where('id', $attendance_id);
		$this->db->update('tbl_attendance',$data);
		redirect('home');
	}
	public function view($id){
		$this->data['employee_id'] = $id;
		$where = "employee_id='$id' and status='not-paid'";
		$this->db->where($where);
		$this->data['employee_attendance'] = $this->db->get('tbl_attendance')->result();
		$this->data['subview'] = 'attendance/view';
		$this->load->view('main_layout', $this->data);
	}

	public function check_if_time_in($id){
		$now = date('Y-m-d');
		$where = "employee_id='$id' and date='$now'";
		$this->db->where($where);
		return $this->db->get('tbl_attendance')->result();
	}
	public function add_attendance($employee_id){
		$this->data['employee_id'] = $employee_id;
		$this->data['subview'] = 'attendance/add';
		$this->load->view('main_layout', $this->data);
	}
	public function save($employee_id){
		$date = $this->input->post('date');
		$time_out = $this->input->post('time_out');
		$time_in = $this->input->post('time_in');
		
		$this->db->where('date', $date);
		$res = $this->db->get('tbl_attendance')->row();
		if(!$res){
			//add 
			$data = array(
				'employee_id' => $employee_id,
				'date' => $date,
				'time_in' => $this->input->post('time_in'),
				'time_out' => $this->input->post('time_out'),
			);
			$this->db->insert('tbl_attendance', $data);
		}else{
			//ignore
		}

		redirect('attendance/view/' . $employee_id);
	}
	public function edit($employee_id, $attendance_id){
		$this->data['employee_id'] = $employee_id;
		$where = "employee_id='$employee_id' and id='$attendance_id'";
		$this->db->where($where);
		$this->data['attendance'] = $this->db->get('tbl_attendance')->row();
		$this->data['subview'] = 'attendance/edit';
		$this->load->view('main_layout', $this->data);
	}
	public function update($employee_id, $attendance_id){
		$where = "employee_id='$employee_id' and id='$attendance_id'";
		$data = array(
			'time_in' => $this->input->post('time_in'),
			'time_out' => $this->input->post('time_out'),
			);
		$this->db->where($where);
		$this->db->update('tbl_attendance', $data);
		redirect('attendance/view/' . $employee_id);
	}
}
?>