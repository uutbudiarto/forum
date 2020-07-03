<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_m','home');
    $this->load->model('announcement/Announcement_m','ann');
  }
  public function index()
  {
      is_logged_in();
      $data = [
        'title' => 'Home',
        'all_users' => $this->home->getAllUser(),
        'chat_root' => $this->home->getChatRoot(),
        'get_chat_fa' => $this->home->getChatFA(),
        'ann' => $this->ann->getAnn()
      ];
      $this->load->view('templates/header',$data);
      $this->load->view('index',$data);
      $this->load->view('templates/footer');
  }

  public function get_chat_root()
  {
    $chatRoot = $this->home->getChatRoot();
    echo json_encode($chatRoot);
  }

  public function get_chat_fa()
  {
    $get_chat_fa = $this->home->getChatFA();
    if ($get_chat_fa) {
      echo json_encode($get_chat_fa);
    }
  }
}