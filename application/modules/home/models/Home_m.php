<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {
  public function getAllUser()
  {
    return $this->db->get('users')->result();
  }
}