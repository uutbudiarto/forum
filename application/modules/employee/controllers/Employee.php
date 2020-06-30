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
      'title' => 'Employee List',
      'employee' => $this->employee->getAllUser()
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }
  public function detail($user_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Employee Detail',
      'emp_det' => $this->employee->getEmpById($user_id) 
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('detail',$data);
    $this->load->view('templates/footer');
  }
}