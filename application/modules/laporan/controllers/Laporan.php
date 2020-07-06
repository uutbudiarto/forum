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
      'emp' => $this->laporan->getEmp()
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }


  // == FILTER LAPORAN ==//
  public function laporan_by_emp($emp_id = null)
  {
    if($emp_id === null){
      $laporan = $this->laporan->getLaporan();
      if ($laporan) {
        echo json_encode($laporan);
      }else{
        return false;
      }
    }else{
      $reportemp = $this->laporan->getLaporanByEmp($emp_id);
      if($reportemp){
        echo json_encode($reportemp);
      }
    }
  }

  public function search_laporan($keyword = null)
  {
    if($keyword === null){
      $laporan = $this->laporan->getLaporan();
      if ($laporan) {
        echo json_encode($laporan);
      }else{
        return false;
      }
    }else{
      $reportemp = $this->laporan->getLaporanByKeyword($keyword);
      if($reportemp){
        echo json_encode($reportemp);
      }
    }
  }
  public function get_laporan_by_date()
  {
    $date = [
      'start_date' => $this->input->post('start_date',true),
      'end_date' => $this->input->post('end_date',true)
    ];
    if($date === null){
      $laporan = $this->laporan->getLaporan();
      if ($laporan) {
        echo json_encode($laporan);
      }else{
        return false;
      }
    }else{
      $reportemp = $this->laporan->getLaporanByDate($date);
      if($reportemp){
        echo json_encode($reportemp);
      }
    }
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

  public function get_laporan_by_user_id($user_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Laporan Karyawan',
      'lap_emp' => $this->laporan->getLaporanByUserId($user_id),
    ];  
    $this->load->view('templates/header',$data);
    $this->load->view('laporan-per-emp',$data);
    $this->load->view('templates/footer');
  }




  public function reset_notif($report_id)
  {
    $result = $this->laporan->resetNotif($report_id);
    if($result){
      echo json_encode($result);
    }
  }
}