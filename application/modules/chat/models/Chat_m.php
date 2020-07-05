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
        'is_active' => 1,
        'count_chat_adm' => 0,
        'count_chat_emp' => 0
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

  public function getAllChatRoot()
  {
    $user = $this->session->userdata('user_id');
    $this->db->select('
      chat_root.id as chat_root_id,
      chat_root.time_created,
      chat_root.count_chat_adm,
      chat_root.count_chat_emp,
      users.image,
      users.fullname,
      position.position_name,
    ');
    $this->db->from('chat_root');
    $this->db->join('users','users.id = chat_root.to_user');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('from_user',$user);
    $this->db->where('chat_root.is_active',1);
    return $this->db->get()->result();
  }
  public function getUserReceiver($receiver)
  {
    return $this->db->get_where('users',['id' => $receiver])->row();
  }

  public function postChat($data)
  {
    $this->db->insert('chat',$data);
    if($this->db->affected_rows() > 0){
      $cr = $this->db->get_where('chat_root',['id' => $data['chat_root_id']])->row();
      $count_adm = $cr->count_chat_adm;
      $new_count = $count_adm + 1;

      $this->db->set('count_chat_adm', $new_count);
      $this->db->where('id',$data['chat_root_id']);
      $this->db->update('chat_root');
      if($this->db->affected_rows() > 0){
        return true;
      }
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

  public function resetCountEmp($chat_root_id)
  {
    $this->db->set('count_chat_adm',0);
    $this->db->where('id',$chat_root_id);
    $this->db->update('chat_root');
  }
  public function resetCountAdm($receiver)
  {
    $from_user = $this->session->userdata('user_id');
    $to_user = $receiver;

    $this->db->set('count_chat_emp',0);
    $this->db->where('from_user',$from_user);
    $this->db->where('to_user',$to_user);
    $this->db->update('chat_root');
  }

  public function userReply($data)
  {
    $this->db->insert('chat',$data);
    if($this->db->affected_rows() > 0){
      $cr = $this->db->get_where('chat_root',['id' => $data['chat_root_id']])->row();
      $count_emp = $cr->count_chat_emp;
      $new_count = $count_emp + 1;

      $this->db->set('count_chat_emp', $new_count);
      $this->db->where('id',$data['chat_root_id']);
      $this->db->update('chat_root');
      if($this->db->affected_rows() > 0){
        return true;
      }
    }else{
      return false;
    }
  }


  public function getChatAllByRootChatIdAndDate($data)
  {
    $this->db->where('chat_root_id',$data['chat_root_id']);
    $this->db->where('created_at',$data['date']);
    return $this->db->get('chat')->result();
  }



  // Tambahan Chat
  public function chat_root($id)
  {
    $user = $this->session->userdata('user_id');
    $this->db->select('
      chat_root.id as chat_root_id,
      chat_root.time_created,
      chat_root.count_chat_adm,
      chat_root.count_chat_emp,
      users.image,
      users.fullname,
      position.position_name,
    ');
    $this->db->from('chat_root');
    $this->db->join('users','users.id = chat_root.to_user');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('from_user',$user);
    $this->db->where('chat_root.id',$id);
    $this->db->where('chat_root.is_active',1);
    return $this->db->get()->row();
  }
}