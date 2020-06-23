<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_m','home');
  }
  public function index()
  {
      is_logged_in();
      $data = [
        'title' => 'Home',
        'all_users' => $this->home->getAllUser()
      ];
      $this->load->view('templates/header',$data);
      $this->load->view('index',$data);
      $this->load->view('templates/footer');
  }
}