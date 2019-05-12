<?php
class Leave extends User_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	public function index(){
		//Pagination
		if($this->input->post('filter_date')){
			$date = $this->input->post('filter_date');
			$where = "date='$date'";
			$this->db->where($where);
			$this->data['leave'] = $this->db->get('tbl_leave')->result();
			$this->data['selected_date'] = $date;
		}else{
			$now = date('Y-m-d');
			$where = "date='$now'";
			$this->db->where($where);
			$this->data['leave'] = $this->db->get('tbl_leave')->result();
			$this->data['selected_date'] = $now;
		}

		$config['base_url'] = base_url() . 'employees/index/';
		$config['per_page'] = 15;
		$config['total_rows'] = $this->M_User->count_employees();
		$offset = $this->uri->segment(3);
		$this->data['offset'] = $offset;
		$this->pagination->initialize($config);

		$this->data['employees'] = $this->M_User->fetch_employees($config['per_page'],$offset);
		$this->data['subview'] = 'leave/index';
		$this->load->view('main_layout', $this->data);
	}
	public function add_leave($id){
		$this->data['employee'] = $this->M_User->get_employee_details($id);
		$this->data['employee_id'] = $id;
		$this->data['subview'] = 'leave/add';
		$this->load->view('main_layout', $this->data);
	}
	public function save(){
		$data = array(
			'employee_id' => $this->input->post('employee_id'),
			'date' => $this->input->post('date'),
			'note' => $this->input->post('notes'),
			);
		if($this->db->insert('tbl_leave', $data)){
			redirect('leave');
		}
	}
	public function remove_leave($id){
		$this->db->where('id' ,$id);
		$this->db->limit(1);
		$this->db->delete('tbl_leave');
		redirect('leave');
	}
}
?>