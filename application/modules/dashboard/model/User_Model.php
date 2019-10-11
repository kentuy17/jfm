<?php
class User_Model extends CI_Model{
 
  public function __construct(){
  	parent::__construct();
  }

  function displayusers(){
    $query = $this->db->query("SELECT aut_users.id, aut_users.username, aut_users.email, aut_users.name, aut_users.status,
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
    print_r($query);

    /*SELECT Orders.OrderID, Customers.CustomerName, Shippers.ShipperName
FROM ((Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID);*/
  }

  function editusers($id) 
  {
    $query = $this->db->query("SELECT aut_users.id, aut_users.username, aut_users.email, aut_users.name, aut_users.status,
    							 aut_department_users.user_id, aut_departments.code as 'Department',
    							 aut_user_locations.user_id, aut_locations.location,
    							 aut_user_ranks.user_id, aut_ranks.rank
    						   FROM ((((((aut_users 
    						   LEFT JOIN aut_department_users ON aut_users.id = aut_department_users.user_id)
    						   LEFT JOIN aut_departments ON aut_department_users.department_code = aut_departments.id)
    						   LEFT JOIN aut_user_locations ON aut_users.id = aut_user_locations.user_id)
    						   LEFT JOIN aut_locations ON aut_user_locations.location_id = aut_locations.id)
    						   LEFT JOIN aut_user_ranks ON aut_users.id = aut_user_ranks.user_id)
    						   LEFT JOIN aut_ranks ON aut_user_ranks.rank_id = aut_ranks.id) WHERE aut_users.id='$id'");
    return $query->result(); 
  }
 }