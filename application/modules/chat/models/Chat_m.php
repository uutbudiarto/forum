<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_m extends CI_Model {
  public function createChatRoot($receiver)
  {
    $chat_root = $this->db->get_where('chat_root',[
      'to_user' => $receiver,
      'from_user' => $this->session->userdata('user_id')
      ])->num_rows();
    if ($chat_root < 1) {
      $data = [
        'from_user' => $this->session->userdata('user_id'),
        'to_user' => $receiver,
        'time_created' => time(),
        'created_at' => date('Y-m-d',time()),
        'updated_at' => date('Y-m-d',time()),
        'is_active' => 1
      ];
      $this->db->insert('chat_root',$data);
      if($this->db->affected_rows() > 0){
        redirect('chat/index/'.$receiver);
      }
    }else{
      $this->db->where('from_user',$this->session->userdata('user_id'));
      $this->db->where('to_user',$receiver);
      return $this->db->get('chat_root')->row()->id;
    }
  }
  public function getUserReceiver($receiver)
  {
    return $this->db->get_where('users',['id' => $receiver])->row();
  }

  public function postChat($data)
  {
    $this->db->insert('chat',$data);
    if($this->db->affected_rows() > 0){
      return true;
    }
  }
  public function getChatByRootChatId($chat_root_id)
  {
    return $this->db->get_where('chat',['chat_root_id' => $chat_root_id])->result();
  }
  public function userReplyChat($chat_root_id)
  {
    $this->db->select('
      chat.id as chat_id,
      chat.chat_root_id,
      chat.user_id,
      users.fullname,
      users.image,
      chat.chat_text,
      chat.time_created,
    ');
    $this->db->from('chat');
    $this->db->join('users','users.id = chat.user_id');
    $this->db->where('chat_root_id',$chat_root_id);
    return $this->db->get()->result();
  }
  public function userReply($data)
  {
    $this->db->insert('chat',$data);
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }
}