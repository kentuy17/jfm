<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->model('User_Model');
	$this->data['module_name'] = 'User Management';
	  if($this->session->userdata('logged_in') !== TRUE){
        redirect('auth');
      }
	}

	public function index()
	{
		$this->firephp->log('my string message' );
		$this->firephp->info('test');	
	}

	public function userlist()
	{
		$this->data['page_title'] = 'User List | AVega Business Automation System';
		$this->data['content_body'] = 'datatable';

		$result['item'] = $this->User_Model->getUsers();
		$result['department'] = $this->User_Model->getDepartment();
		$result['location'] = $this->User_Model->getLocation();
		$result['rank'] = $this->User_Model->getRank();
		$this->data['param'] = $result;
		$id=$this->input->get('id');

		if($this->input->post('add'))
		{
			$last_name=$this->input->post('last_name');
			$first_name=$this->input->post('first_name');
			$middle_name=$this->input->post('middle_name');
			$username=$this->input->post('username');
			$email=$this->input->post('email');
			$password=md5($this->input->post('password'));
			$department=$this->input->post('department');
			$location=$this->input->post('location');

			if(empty($last_name) || (empty($first_name)) || empty($username) || empty($email)){
				redirect('user/error');
			}else{
				$this->User_Model->addUser($last_name,$first_name,$middle_name,$username,$email,$password,$department,$location);

				redirect('user/userlist?add=success');
			}
		}
		$this->load->view(THEME.'/index', $this->data);		
		//$this->load->view('add_user',$result);
	}

	public function edit()
	{
		$this->data['page_title'] = 'Edit User | AVega Business Automation System';
		
		$id=$this->input->get('id');
		$this->data['content_body'] = 'edit';

		$result['user'] = $this->User_Model->getUser($id);
		$result['department'] = $this->User_Model->getDepartment();
		$result['location'] = $this->User_Model->getLocation();
		$result['rank'] = $this->User_Model->getRank();
		$this->data['param'] = $result;
		//$action=$this->input->get('action');
		//print_r($result['user']->Department);
		if($this->input->post('save'))
		{	
			/** init **/
			$last_name=$this->input->post('last_name');
			$first_name=$this->input->post('first_name');
			$middle_name=$this->input->post('middle_name');
			$username=$this->input->post('username');
			$email=$this->input->post('email');
			$department=$this->input->post('department');
			$location=$this->input->post('location');
			$rank=$this->input->post('rank');
			/** aut_users **/
			$this->User_Model->updateUser($last_name,$first_name,$middle_name,$username,$email,$id);
			/** Department **/
			if(isset($result['user']->Department)){
				$this->User_Model->updateUserDepartment($department,$id);
			}else{
				if(isset($_POST['department'])){
				//if(isset($department)){
					$this->User_Model->insertUserDepartment($department,$id);
				}
			}
			/** Location **/
			if(isset($result['user']->location)){
				$this->User_Model->updateUserLocation($location,$id);
			}else{
				if(isset($_POST['location'])){
					$this->User_Model->insertUserLocation($location,$id);
				}
			}
			/** Rank **/
			if(isset($result['user']->rank)){
				$this->User_Model->updateUserRank($rank,$id);
			}else{
				if(isset($_POST['rank'])){
					$this->User_Model->insertUserRank($rank,$id);
				}
			}
			redirect('user/userlist');
		}
		//print_r($location);
		//print_r($result['user']);
		$this->load->view(THEME.'/index', $this->data);

	}

}
