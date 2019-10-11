<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	  if($this->session->userdata('logged_in') !== TRUE){
        redirect('login');
      }
	}

	public function index()
	{
		$this->firephp->log('my string message' );
		$this->firephp->info('test');

		$this->data['page_title'] = 'AVega Business Automation System';
		//$this->data['page_styles'] = 'page_styles';
		//$this->data['custom_styles'] = 'custom_styles';
		//$this->data['menu_aside'] = 'menu_aside_welcome';
		//$this->data['menu_header'] = 'menu_header';
		//$this->data['notification'] = 'notification';
		//$this->data['quick_action'] = 'quick_action';
		//$this->data['user_bar'] = 'user_bar';
		//$this->data['content_head'] = 'content_head';
		//$this->data['content_body'] = 'content_body';
		//$this->data['footer'] = 'footer';
		//$this->data['page_scripts'] = 'page_scripts';
		//$this->data['custom_scripts'] = 'custom_scripts';
		//$this->data['content_body'] = 'default/user_list';
		//$data['item'] = $this->User_Model->displayusers();

		$this->load->view('content_body');
	}
}
