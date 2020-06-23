<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Laporan_m','laporan');
  }
  public function index()
  {
    is_logged_in();
    $data = [
      'title' => 'Laporan',
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }
  public function get_laporan()
  {
    $laporan = $this->laporan->getLaporan();
    if ($laporan) {
      echo json_encode($laporan);
    }else{
      return false;
    }
  }
}