<?php
class Admin_Model extends CI_Model{

  public function __construct(){
  	parent::__construct();
  }
  //---------------------------- Department -------------------------------------------------------
  function getDepartments(){
    $query = $this->db->query("SELECT * FROM aut_departments");
    return $query->result();
    //print_r($query);
  }

  function getDepartment($id){
    $query = $this->db->query("SELECT * FROM aut_departments WHERE id='$id'");
    return $query->row(); 
  }

  function updateDepartment($id,$code,$department){
    $query = $this->db->query("UPDATE aut_departments SET code='$code', department='$department'
                  WHERE id='$id'");
  }

  function insertDepartment($code,$department) {
    $query = $this->db->query("INSERT INTO aut_departments (code, department)
                  VALUES ('$code', '$department')");
  }
  //----------------------------- Location ---------------------------------------------------------
  function getLocations(){
    $query = $this->db->query("SELECT * FROM aut_locations");
    return $query->result();
  }

  function getLocation($id){
    $query = $this->db->query("SELECT * FROM aut_locations WHERE id='$id'");
    return $query->row();
  }

  function updateLocation($id,$location){
    $query = $this->db->query("UPDATE aut_locations SET location='$location'
                  WHERE id='$id'");
  }

  function insertLocation($location) {
    $query = $this->db->query("INSERT INTO aut_locations (location)
                  VALUES ('$location')");
  }  
  //----------------------------- Rank ---------------------------------------------------------
  function getRanks(){
    $query = $this->db->query("SELECT * FROM aut_ranks");
    return $query->result();
  }

  function getRank($id){
    $query = $this->db->query("SELECT * FROM aut_ranks WHERE id='$id'");
    return $query->row();
  }

  function updateRank($id,$rank){
    $query = $this->db->query("UPDATE aut_ranks SET rank='$rank'
                  WHERE id='$id'");
  }

  function insertRank($rank) {
    $query = $this->db->query("INSERT INTO aut_ranks (rank)
                  VALUES ('$rank')");
  }  
}
