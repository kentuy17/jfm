<?php
class User_Model extends CI_Model{
 
  public function __construct(){
  	parent::__construct();
  }

  function getUsers(){
    $query = $this->db->query("SELECT aut_users.id, aut_users.username, aut_users.email, aut_users.last_name, aut_users.first_name, aut_users.middle_name, aut_users.status,
    							 aut_department_users.user_id, aut_departments.code as 'Department',
    							 aut_user_locations.user_id, aut_locations.location,
    							 aut_user_ranks.user_id, aut_ranks.rank
    						   FROM ((((((aut_users 
    						   LEFT JOIN aut_department_users ON aut_users.id = aut_department_users.user_id)
    						   LEFT JOIN aut_departments ON aut_department_users.department_code = aut_departments.id)
    						   LEFT JOIN aut_user_locations ON aut_users.id = aut_user_locations.user_id)
    						   LEFT JOIN aut_locations ON aut_user_locations.location_id = aut_locations.id)
    						   LEFT JOIN aut_user_ranks ON aut_users.id = aut_user_ranks.user_id)
    						   LEFT JOIN aut_ranks ON aut_user_ranks.rank_id = aut_ranks.id)");
    return $query->result();
    //print_r($query);
  }

  function getUser($id) 
  {
    $query = $this->db->query("SELECT aut_users.id, aut_users.username, aut_users.email, aut_users.last_name, aut_users.first_name, aut_users.middle_name, aut_users.status,
    							 aut_department_users.user_id, aut_departments.department as 'Department',
    							 aut_user_locations.user_id, aut_locations.location,
    							 aut_user_ranks.user_id, aut_ranks.rank
    						   FROM ((((((aut_users 
    						   LEFT JOIN aut_department_users ON aut_users.id = aut_department_users.user_id)
    						   LEFT JOIN aut_departments ON aut_department_users.department_code = aut_departments.id)
    						   LEFT JOIN aut_user_locations ON aut_users.id = aut_user_locations.user_id)
    						   LEFT JOIN aut_locations ON aut_user_locations.location_id = aut_locations.id)
    						   LEFT JOIN aut_user_ranks ON aut_users.id = aut_user_ranks.user_id)
    						   LEFT JOIN aut_ranks ON aut_user_ranks.rank_id = aut_ranks.id) WHERE aut_users.id=$id");
    return $query->row(); 
  }

  function getDepartment()
  {
    $query = $this->db->query("SELECT * FROM aut_departments");
    return $query->result();
  }

  function getLocation()
  {
    $query = $this->db->query("SELECT * FROM aut_locations");
    return $query->result();
  }

  function getRank()
  {
    $query = $this->db->query("SELECT * FROM aut_ranks");
    return $query->result();
  }

  function updateUserLocation($location,$id)
  {
    $query = $this->db->query("UPDATE aut_user_locations
                  SET aut_user_locations.location_id = 
                    (SELECT aut_locations.id FROM aut_locations
                     WHERE aut_locations.location='$location')
                  WHERE aut_user_locations.user_id='$id'");
  }

  function updateUser($last_name,$first_name,$middle_name,$username,$email,$id)
  {
    $query = $this->db->query("UPDATE aut_users 
                  SET last_name='$last_name', first_name='$first_name', middle_name='$middle_name', username='$username', email='$email'
                  WHERE id='$id'");
  }

  function updateUserDepartment($department,$id)
  {
    $query = $this->db->query("UPDATE aut_department_users
                  SET aut_department_users.department_code = 
                    (SELECT aut_departments.id FROM aut_departments
                     WHERE aut_departments.department='$department')
                  WHERE aut_department_users.user_id='$id'");
  }

  function updateUserRank($rank,$id)
  {
    $query = $this->db->query("UPDATE aut_user_ranks
                  SET aut_user_ranks.rank_id = 
                    (SELECT aut_ranks.id FROM aut_ranks
                     WHERE aut_ranks.rank='$rank')
                  WHERE aut_user_ranks.user_id='$id'");
  }

  function insertUserDepartment($department,$id)
  {
    $query = $this->db->query("INSERT INTO aut_department_users (department_code, user_id, duration_start)
                  VALUES ((SELECT aut_departments.id FROM aut_departments 
                          WHERE aut_departments.department='$department'), 
                          '$id', curdate())");
  }

  function insertUserLocation($location,$id)
  {
    $query = $this->db->query("INSERT INTO aut_user_locations (location_id, user_id, duration_start)
                  VALUES ((SELECT aut_locations.id FROM aut_locations 
                          WHERE aut_locations.location='$location'), 
                          '$id', curdate())");
  }

  function insertUserRank($rank,$id)
  {
    $query = $this->db->query("INSERT INTO aut_user_ranks (rank_id, user_id, duration_start)
                  VALUES ((SELECT aut_ranks.id FROM aut_ranks 
                          WHERE aut_ranks.rank='$rank'), 
                          '$id', curdate())");
  }

  function addUser($last_name,$first_name,$middle_name,$username,$email,$password,$department,$location)
  {
    $default_pass = md5('123456');
    $query = $this->db->query("INSERT INTO aut_users (last_name, first_name, middle_name, username, email,password)
                  VALUES ('$last_name', '$first_name', '$middle_name', '$username', '$email', '$default_pass')");
    $query = $this->db->query("INSERT INTO aut_department_users (department_code, user_id, duration_start)
                  VALUES ((SELECT id FROM aut_departments WHERE aut_departments.department = '$department'), 
                          (SELECT id FROM aut_users ORDER BY id DESC LIMIT 1),
                          curdate())");
    $query = $this->db->query("INSERT INTO aut_user_locations (location_id, user_id, duration_start)
                  VALUES ((SELECT id FROM aut_locations WHERE aut_locations.location = '$location'), 
                          (SELECT id FROM aut_users ORDER BY id DESC LIMIT 1),
                          curdate())");
  }

}
