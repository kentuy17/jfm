<?php
class Login_Model extends CI_Model{
 
  function validate($user,$password){
    $this->db->where('user',$email);
    $this->db->where('pass',$password);
    $result = $this->db->get('system_user',1);
    return $result;
  }

  function getItem($tbl,$data)
  {
  	$this->db->from($tbl);
  	$this->db->where($data);
  	$query = $this->db->get();
  	return $query->row();
  }
 }