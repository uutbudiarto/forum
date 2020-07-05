<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Chat_m','chat');
  }
  public function index($receiver)
  {
    is_logged_in();
    $data = [
      'title' => 'Chat',
      'chat_root' => $this->chat->createChatRoot($receiver),
      'user_receiver' => $this->chat->getUserReceiver($receiver),
      'reset_count_emp' => $this->chat->resetCountAdm($receiver)
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }

  public function history()
  {
    is_logged_in();
    $data = [
      'title' => 'Chat',
      'chat_root' => $this->chat->getAllChatRoot(),
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('chat-history',$data);
    $this->load->view('templates/footer');
  }

  public function get_chat_by_history($id)
  {
    is_logged_in();
    $data = [
      'title' => 'Chat',
      'chat_root' => $this->chat->chat_root($id),
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('chat-history-by-root',$data);
    $this->load->view('templates/footer');
  }

  public function get_chat_by_filter_date()
  {
    $data = [
      'chat_root_id' => $this->input->post('root',true),
      'date' => $this->input->post('date',true),
    ];
    $result = $this->chat->getChatAllByRootChatIdAndDate($data);
    if($result){
      echo json_encode($result);
    }else{
      return false;
    }
  }


  public function chat_with()
  {
    is_logged_in();
    $data = [
      'chat_root_id' => $this->input->post('chat_root_id'),
      'user_id' => $this->session->userdata('user_id'),
      'chat_text' => $this->input->post('chat_text'),
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_readed' => 0,
      'is_active' => 1,
    ];
    $result = $this->chat->postChat($data);
    if ($result) {
      echo json_encode($result);
    }
  }
  public function get_chat_by_root_chat_id($chat_root_id)
  {
    $result = $this->chat->getChatByRootChatId($chat_root_id);
    if($result){
      echo json_encode($result);
    }else{
      return false;
    }
  }

  public function load_reply_chat($chat_root_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Chat',
      'chat_root_id' => $chat_root_id,
      'reset_count_emp' => $this->chat->resetCountEmp($chat_root_id)
      
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('user-reply',$data);
    $this->load->view('templates/footer');
  }
  public function get_reply_chat($chat_root_id)
  {
    $result = $this->chat->userReplyChat($chat_root_id);
    if ($result) {
      echo json_encode($result);
    }
  }
  public function user_replay()
  {
    $data = [
      'chat_root_id' => $this->input->post('chat_root_id'),
      'user_id' => $this->session->userdata('user_id'),
      'chat_text' => $this->input->post('chat_text'),
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_readed' => 0,
      'is_active' => 1,
    ];

    $result = $this->chat->userReply($data);
    if($result){
      echo json_encode($result);
    }
  }



  // reset adm count resetCountAdm
  public function reset_adm($receiver)
  {
    $this->chat->resetCountAdm($receiver);
  }
  public function reset_emp($chat_root_id)
  {
    $this->chat->resetCountEmp($chat_root_id);
  }


  public function load_confirm($root)
  {
    $data['root'] = $root;
    $this->load->view('confirm-clear',$data);
  }
  public function clear_chat_by_root()
  {
    $chat_root_id = $this->input->post('chat_root_id');
    $this->db->where('chat_root_id', $chat_root_id);
    $this->db->delete('chat');

    //FOR SOFT DELETE
    // $this->db->set('is_active',0);
    // $this->db->update('chat');
    if($this->db->affected_rows() > 0){
      $this->db->set('count_chat_adm',0);
      $this->db->set('count_chat_emp',0);
      $this->db->where('id',$chat_root_id);
      $this->db->update('chat_root');
      redirect('chat/get_chat_by_history/'.$chat_root_id);
    }
  }

}