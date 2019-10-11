<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Login_Model');

  }
  
  public function index()
  {
    $session_name = $this->session->userdata('name');
    $this->firephp->log($session_name);

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
    //$data['item'] = $this->User_Model->displayusers();

    //$this->load->view(THEME.'/index', $this->data);
    $this->load->view('login');
  }

  public function authenticate(){
    $user = $this->input->post('user');
    $pass = md5($this->input->post('pass'));
    $data = array(
      'user' => $user,
      'pass' => $pass
    );
    $validate = $this->Login_Model->getItem('system_user',$data);
    if($validate != null){
        $sesdata = array(
            'id' => $validate->id,
            'user' => $validate->user,
            'name' => $validate->lname.', '.$validate->fname,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        redirect('dashboard');
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login?status=incorrect');
    }
  }
 
  public function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }
}
