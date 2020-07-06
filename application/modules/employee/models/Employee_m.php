<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model {
  public function getAllUser()
  {
    $this->db->select('
      users.id,
      users.role_id,
      users.email,
      users.phone,
      users.fullname,
      users.image,
      users.created_at,
      position.position_name
    ');
    $this->db->join('position','position.id = users.position_id');
    return $this->db->get('users')->result();
  }
  public function getEmpById($user_id)
  {
    $this->db->select('
      users.id,
      users.role_id,
      users.email,
      users.phone,
      users.fullname,
      users.image,
      users.created_at,
      position.position_name
    ');
    $this->db->from('users');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('users.id',$user_id);
    return $this->db->get()->row();
  }
}