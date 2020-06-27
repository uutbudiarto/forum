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
      'user_receiver' => $this->chat->getUserReceiver($receiver)
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
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
      'is_active' => 1
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
      'chat_root_id' => $chat_root_id
      
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
}