<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->model('Admin_Model');
	$this->data['module_name'] = 'Locations';
	  if($this->session->userdata('logged_in') !== TRUE){
        redirect('auth');
      }
	}
	public function index()
	{
		redirect('admin/department');
	}

	public function department()
	{
		$this->firephp->log('my string message' );
		$this->firephp->info('test');

		$this->data['page_title'] = 'Department List | AVega Business Automation System';
		$this->data['table_title'] = 'Departments';

		$id=$this->input->get('id');
		$result['departments'] = $this->Admin_Model->getDepartments();
		$result['department'] = $this->Admin_Model->getDepartment($id);
		$this->data['param'] = $result;

		
		if(isset($_GET['edit'])){
			$this->data['content_body'] = 'edit_department';
			//$this->load->view('edit_department',$result);
		}elseif(isset($_GET['add'])){
			$this->data['content_body'] = 'add_department';
		}else{
			$this->data['content_body'] = 'department';
		}
			
		$code = $this->input->post('code');
		$department = $this->input->post('department');
		
		if($this->input->post('save') && isset($_GET['edit'])) {
			$this->Admin_Model->updateDepartment($id,$code,$department);
			redirect('admin/department');
		}
		
		if ($this->input->post('add') && isset($_GET['add'])) {
			$this->Admin_Model->insertDepartment($code,$department);
			redirect('admin/department');
		}
		$this->load->view(THEME.'/index', $this->data);
		//$this->load->view('department',$result);
	}

	public function location()
	{
		$this->firephp->log('my string message' );
		$this->firephp->info('test');

		$this->data['page_title'] = 'Location List | AVega Business Automation System';
		$this->data['table_title'] = 'Locations List';

		$id=$this->input->get('id');
		$result['locations'] = $this->Admin_Model->getLocations();
		$result['location'] = $this->Admin_Model->getLocation($id);
		$this->data['param'] = $result;

		if(isset($_GET['add'])){
			$this->data['content_body'] = 'add_location';	
		}elseif(isset($_GET['edit'])) {
			$this->data['content_body'] = 'edit_location';
			//$this->load->view('edit_location',$result);
		}else {
			$this->data['content_body'] = 'location';	
			//$this->load->view('location',$result);
		}

		$location = $this->input->post('location');

		if($this->input->post('add')) {
			$this->Admin_Model->insertLocation($location);
			redirect('admin/location');
		}

		if($this->input->post('save')) {
			$this->Admin_Model->updateLocation($id,$location);
			//echo $query;
			redirect('admin/location');
		}
	
		$this->load->view(THEME.'/index', $this->data);
		//$this->load->view('location',$result);
	}

	public function rank()
	{
		$this->firephp->log('my string message' );
		$this->firephp->info('test');

		$this->data['page_title'] = 'Rank List | AVega Business Automation System';
		$this->data['table_title'] = 'Ranks List';

		$id=$this->input->get('id');
		$result['ranks'] = $this->Admin_Model->getRanks();
		$result['rank'] = $this->Admin_Model->getRank($id);
		$this->data['param'] = $result;

		if(isset($_GET['add'])){
			$this->data['content_body'] = 'add_rank';	
		}elseif(isset($_GET['edit'])) {
			$this->data['content_body'] = 'edit_rank';
			//$this->load->view('edit_rank',$result);
		}else {
			$this->data['content_body'] = 'rank';	
		}

		$rank = $this->input->post('rank');

		if($this->input->post('add')) {
			$this->Admin_Model->insertRank($rank);
			redirect('admin/rank');
		}

		if($this->input->post('save')) {
			$this->Admin_Model->updateRank($id,$rank);
			//echo $query;
			redirect('admin/rank');
		}

		$this->load->view(THEME.'/index', $this->data);
	}

}
