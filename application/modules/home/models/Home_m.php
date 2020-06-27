<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {
  public function getAllUser()
  {
    return $this->db->get('users')->result();
  }
  public function getChatRoot()
  {
    
    // return $this->db->get_where('chat_root',['to_user' => $this->session->userdata('user_id')])->result();
    $this->db->select('
      chat_root.id as chat_root_id,
      chat_root.from_user,
      position.position_name,
      users.fullname as from,
      users.image,
      chat_root.to_user,
      chat_root.time_created,
    ');
    $this->db->from('chat_root');
    $this->db->join('users','users.id = chat_root.from_user');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('to_user',$this->session->userdata('user_id'));
    return $this->db->get()->result();

    // [id] => 1
    // [from_user] => 25
    // [to_user] => 24
    // [time_created] => 1593177491
    // [created_at] => 2020-06-26
    // [updated_at] => 2020-06-26
    // [deleted_at] => 
    // [is_active] => 1

  }
}