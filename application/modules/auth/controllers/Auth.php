<?php
class Auth extends CI_Controller{
  function __construct(){
    parent::__construct();
    if(($this->session->userdata('logged_in') !== TRUE) || ($this->session->userdata('status')) === "Inactive"){
      redirect('login');
    }
  }
 
  function index(){
      if($this->session->userdata('status')==='Active'){
           redirect('welcome');
      }else{
          $this->load->view(THEME.'/error');
          redirect('user/edit?id=');
      }
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('status')==='2'){
      redirect('welcome');
    }else{
        echo "Access Denied";
    }
  }
 
  function author(){
    //Allowing akses to author only
    if($this->session->userdata('status')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }
 
}