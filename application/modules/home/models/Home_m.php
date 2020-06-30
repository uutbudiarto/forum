<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {
  public function getAllUser()
  {
    return $this->db->get('users')->result();
  }
  public function getChatRoot()
  {
    $this->db->select('
      chat_root.id as chat_root_id,
      chat_root.from_user,
      position.position_name,
      users.fullname as from,
      users.image,
      chat_root.to_user,
      chat_root.count_chat_adm,
      chat_root.count_chat_emp,
      chat_root.time_created,
    ');
    $this->db->from('chat_root');
    $this->db->join('users','users.id = chat_root.from_user');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('to_user',$this->session->userdata('user_id'));
    return $this->db->get()->result();

  }

  public function getChatFA()
  {
    // cek role id login
    $user_from = $this->session->userdata('user_id');

    $this->db->select('
      chat_root.id,
      chat_root.from_user,
      chat_root.to_user,
      users.fullname as replay_from_emp,
      chat_root.time_created,
      chat_root.count_chat_emp
    ');
    $this->db->from('chat_root');
    $this->db->join('users','users.id = chat_root.to_user');
    $this->db->where('chat_root.from_user',$user_from);
    $this->db->where('chat_root.count_chat_emp !=',0);
    $chatunread = $this->db->get()->result();
    return $chatunread;

  }
}