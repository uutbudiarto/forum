<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personchat_m extends CI_Model {
  public function getUserById($number)
  {
    return $this->db->get_where('users',['phone' => $number])->row();
  }
  public function createChatTo($data)
  {
    $this->db->insert('chat',$data);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }
  public function getFisrtChat($number)
  {
    $userDest = $this->db->get_where('users',['phone' => $number])->row();
    $to_user_id = $userDest->id;
    $from_user_id = $this->session->userdata('user_id');

    $this->db->select('
      chat.id as chat_id,
      chat.from_user_id,
      users.fullname as from,
      chat.to_user_id,
      chat.first_chat_text,
      chat.time_created,
      users.id as user_id,
      ');
    $this->db->from('chat');
    $this->db->join('users','users.id = chat.from_user_id');

    $this->db->where('chat.from_user_id',$from_user_id);
    $this->db->where('chat.to_user_id',$to_user_id);

    return $this->db->get()->row();

  }
  public function replayChat($data)
  {
    $this->db->insert('replay_chat',$data);
    if ($this->db->affected_rows() > 0) {
      return true;
    }else{
      return false;
    }
  }
}