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

  // public function create()
  // {
  //   echo 'OK';
  // }



  public function get_laporan()
  {
    $laporan = $this->laporan->getLaporan();
    if ($laporan) {
      echo json_encode($laporan);
    }else{
      return false;
    }
  }
  public function get_laporan_by_id($report_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Report',
      'report' => $this->laporan->getLaporanById($report_id),
    ];  
    $this->load->view('templates/header',$data);
    $this->load->view('detail-laporan',$data);
    $this->load->view('templates/footer');
  }
  public function get_comment_by_report_id($report_id)
  {
    $comment = $this->laporan->getCommentByReportId($report_id);
    if ($comment) {
      echo json_encode($comment);
    }else{
      return false;
    }
  }
  public function create_comment()
  {
    $data = [
      'comment_text' => $this->input->post('comment-write',true),
      'report_id' => $this->input->post('report_id',true),
      'user_id' => $this->session->userdata('user_id'),
      'role_id' => $this->session->userdata('role_id'),
      'like_indicator' => 5,
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_active' => 1
    ];
    
    if($data['comment_text'] != ''){
      $this->laporan->createComment($data);
    }else{
      redirect('laporan/get_laporan_by_id/'.$data['report_id']);
    }
  }
}