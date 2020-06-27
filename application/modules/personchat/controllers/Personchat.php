<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personchat extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Personchat_m','model');
  }

  public function index($number)
  {
    is_logged_in();
    $data = [
      'title' => 'Chat',
      'employee' => $this->model->getUserById($number),
      'get_firt_chat' => $this->model->getFisrtChat($number)
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }
  public function chat_to()
  {
    $userDest = $this->db->get_where('users',['phone' => $this->input->post('phone_to')])->row();
    $to_user_id = $userDest->id;
    $data = [
      'from_user_id' => $this->session->userdata('user_id'),
      'to_user_id' => $to_user_id,
      'first_chat_text' => $this->input->post('chat_text'),
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_active' => 1,
    ];
    $result = $this->model->createChatTo($data);
    if ($result) {
      echo json_encode($result);
    }
  }
  public function replay_to()
  {
    $data = [
      'chat_id' => $this->input->post('chat_id'),
      'user_id' => $this->session->userdata('user_id'),
      'replay_chat_text' => $this->input->post('replay_chat_text'),
      'time_created' => time()
    ];
    $result = $this->model->replayChat($data);
    if ($result) {
      echo json_encode($result);
    }
  }
  public function get_replay($chat_id)
  {
    $this->db->select('*');
    $this->db->from('replay_chat');
    $this->db->where('chat_id',$chat_id);
    $result = $this->db->get()->result();
    if($result){
      echo json_encode($result);
    }else{
      echo false;
    }
  }
}