<?php 
class M_User extends MY_Model
{
	protected $_table_name = 'tbl_admin_account';
	protected $_primary_key = 'id';
	public $rules = array(
			'username' => array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required'
				),
			'password' => array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required'
				),
			);
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password'))
			), TRUE);
		if(count($user))
		{
			$data = array(
				'username' => $user->username,
				'id' => $user->id,
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);
		}
		else
		{
			$data = array(
				'logged_in' => FALSE
				);
			$this->session->set_userdata($data);
		}
		return TRUE;
	}
	public function loggedin()
	{
		return (bool)$this->session->userdata('logged_in');
	}
	public function logout()
	{
		$this->session->sess_destroy();
	}
	public function hash($string)
	{
		return hash('md5',$string);
	}

	public function get_current_user_details(){
		$id = $this->session->userdata('id');
		$this->db->where('id', $id);
		return $this->db->get('tbl_admin_account')->row();
	}
	public function get_employee_rate($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_employee_rate')->row();
	}
	// public function get_employees(){
	// 	$this->db->where('role', 'employee');
	// 	return $this->db->get('tbl_user_details')->result();
	// }
	public function get_employee_details($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_employee_details')->row();
	}
	// public function get_employee_access($id){
	// 	$this->db->where('id', $id);
	// 	return $this->db->get('tbl_user_access')->row();
	// }
	public function count_employees()
	{
		return $this->db->count_all('tbl_employee_details');
	}
	public function fetch_employees($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		$this->db->order_by('id','ASC');
		$query = $this->db->get('tbl_employee_details');
		if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return $query->result();	
			}
	}
	public function search($string){
		$this->db->select('*');
		$this->db->from('tbl_employee_details');
		$this->db->like('name', $string);
		$this->db->or_like('position', $string);
		$this->db->or_like('nickname', $string);
		$this->db->or_like('birthday', $string);
		$this->db->or_like('gender', $string);
		$this->db->or_like('age', $string);
		$this->db->or_like('civil_status', $string);
		$this->db->or_like('religion', $string);
		$this->db->or_like('height', $string);
		$this->db->or_like('weight', $string);
		$this->db->or_like('nationality', $string);
		$this->db->or_like('address', $string);
		$this->db->or_like('language', $string);
		$this->db->or_like('address', $string);
		$this->db->or_like('contact', $string);
		$this->db->or_like('email', $string);
		$this->db->or_like('blood_type', $string);
		$this->db->or_like('college_level', $string);
		$this->db->or_like('course', $string);
		$this->db->or_like('level', $string);
		$this->db->or_like('secondary', $string);
		$this->db->or_like('primary_level', $string);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}
	public function check_if_time_in($id){
		$now = date('Y-m-d');
		$where = "employee_id='$id' and date='$now'";
		$this->db->where($where);
		return $this->db->get('tbl_attendance')->result();
	}
	public function check_if_time_out($id){
		$now = date('Y-m-d');
		$where = "employee_id='$id' and date='$now' and isNull(time_out)";
		$this->db->where($where);
		return $this->db->get('tbl_attendance')->row();
	}
	public function check_if_leave($id){
		$now = date('Y-m-d');
		$where = "employee_id='$id' and date='$now'";
		$this->db->where($where);
		return $this->db->get('tbl_leave')->row();
	}
	// public function get_current_user_attendance(){
	// 	$id = $this->session->userdata('id');
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_attendance')->result();
	// }
	// public function get_current_user_leave(){
	// 	$id = $this->session->userdata('id');
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_leave')->result();
	// }
	// public function get_current_user_bonus(){
	// 	$id = $this->session->userdata('id');
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_bonus')->result();
	// }
	// public function get_user_attendance($id){
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_attendance')->result();
	// }
	// public function get_user_leave($id){
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_leave')->result();
	// }
	// public function get_user_bonus($id){
	// 	$this->db->where('employee_id', $id);
	// 	return $this->db->get('tbl_bonus')->result();
	// }
}
?>