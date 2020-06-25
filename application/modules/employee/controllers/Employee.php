<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Employee_m','employee');
  }

  public function index()
  {
    is_logged_in();
    $data = [
      'title' => 'Home',
      'employee' => $this->employee->getAllUser()
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }
}