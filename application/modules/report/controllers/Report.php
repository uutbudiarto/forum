<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report_m','report');
  }
  public function index()
  {
    is_logged_in();
    $data = [
      'title' => 'Report',
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }
  public function get_report()
  {
    $reports = $this->report->getAllReport();
    echo '<pre>';
    //print_r($reports);
    echo '</pre>';

    if($reports){
      foreach ($reports as $rpt) {
        // KONDISI ADMIN BACA LAPORAN
        if($this->session->userdata('role_id') == 1){
          if($rpt->is_owner_readed == 0){
            $baca_laporan = 'Laporan belum dibaca';
          }else{
            $baca_laporan = '';
          }
        }else if($this->session->userdata('role_id') == 2){
          if($rpt->is_manager_readed == 0){
            $baca_laporan = 'Laporan belum dibaca';
          }else{
            $baca_laporan = '';
          }
        }else if($this->session->userdata('role_id') == 3){
          if($rpt->is_manager2_readed == 0){
            $baca_laporan = 'Laporan belum dibaca';
          }else{
            $baca_laporan = ''; 
          }
        }else{
          if($rpt->is_user_readed == 0){
            $baca_laporan = 'Laporan belum dibaca';
          }else{
            $baca_laporan = ''; 
          }
        }
        //KONDISI BACA KOMEN
        if($this->session->userdata('role_id') == 1){
          if($rpt->count_comment_owner == 0){
            $baca_komen = 'ada tanggapan baru';
          }else{
            $baca_komen = '';
          }
        }else if($this->session->userdata('role_id') == 2){
          if($rpt->count_comment_manager == 0){
            $baca_komen = 'ada tanggapan baru';
          }else{
            $baca_komen = '';
          }
        }else if($this->session->userdata('role_id') == 3){
          if($rpt->count_comment_manager2 == 0){
            $baca_komen = 'ada tanggapan baru';
          }else{
            $baca_komen = ''; 
          }
        }else{
          if($rpt->count_comment_user == 0){
            $baca_komen = 'ada tanggapan baru';
          }else{
            $baca_komen = ''; 
          }
        }
        if($rpt->count_comment == 0){
          $baca_komen = '';
        }
        echo '
        <div class="row no-gutters border-top">
          <div class="col-md-2 col-2">
            <img src="'.base_url('assets/img/profile/').$rpt->user_image.'" class="card-img mt-3">
          </div>
          <div class="col-md-10 col-10">
            <div class="card-body">
              <div class="indicator-read">
                <span class="indicator-manager text-danger">'. $baca_laporan .'</span>
              </div>
              <h6 class="card-title">'.$rpt->fullname.'</h6>
              <span class="card-text d-block">'.$rpt->report_text.'</span>
              <small class="text-muted">'.date('d-m-Y',$rpt->time_created).'</small>
            </div>
            <div class="d-flex justify-content-between p-2">
              <small class="text-danger"> <b>'.$baca_komen.'</b> </small>
              <a href="javascript:void(0)" class="btn btn-primary rounded btn-sm btnReadReport" data-id="'.$rpt->report_id.'">
              <i class="fas fa-comment"></i>
              <span class="badge badge-sucsess">'.$rpt->count_comment.'</span>
              </a>
            </div>
          </div>
        </div>
        ';
      }
    }else{
      echo '
      <div class="mt-5 pt-5">
      <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
      <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
      </div>
      ';
    }
  }
  public function detail_report($report_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Report',
      'dtl_report' => $this->report->getReportById($report_id)
    ];    
    $this->load->view('templates/header',$data);
    $this->load->view('detail_report',$data);
    $this->load->view('templates/footer');
  }
  
  public function create()
  {
    is_logged_in();
    $data = [
      'title' => 'Report',
    ];
    
    $report = [
      'user_id' => $this->session->userdata('user_id'),
      'report_text' => $this->input->post('report-text'),
      'report_image' => 'default.png',
      'report_file' => 'default.txt',
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_active' => 1,
      'is_owner_readed' => 0,
      'is_manager_readed' => 0,
      'is_manager2_readed' => 0,
      'count_comment' => 0,
      'count_comment_manager' => 0,
      'count_comment_manager2' => 0,
      'count_comment_owner' => 0,
      'count_comment_user' => 0,
    ];
    
    $this->form_validation->set_rules('report-text','laporan','required|trim|min_length[10]',[
      'required' => '%s tidak boleh',
      'min_length' => '%s minimal 10 karakter'
      ]);
      
      if ($this->form_validation->run() == false) {
        $this->load->view('templates/header',$data);
        $this->load->view('create-report',$data);
        $this->load->view('templates/footer');
      }else{
        $results = $this->report->createReport($report);
        if ($results) {
          $this->session->set_flashdata('message','
          <div class="alert alert-success rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Success</strong> Laporan terkirim
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ');
          redirect('profile');
        }
      }
    }
    public function buat_komentar()
    {
      $comment_text = $this->input->post('comment_text');
      $report_id = $this->input->post('report_id');
      $data = [
        'comment_text' => $comment_text,
        'report_id' => $report_id,
        'user_id' => $this->session->userdata('user_id'),
        'role_id' => $this->session->userdata('role_id'),
        'like_indicator' => 5,
        'time_created' => time(),
        'created_at' => date('Y-m-d',time()),
        'updated_at' => date('Y-m-d',time()),
        'is_active' => 1
      ];
      $this->report->postKomentar($data);
    }
    
    public function comment_report($report_id)
    {
      $user_sess = $this->session->userdata('user_id');
      $user_role = $this->session->userdata('role_id');
      $comment = $this->report->getCommentByIdReport($report_id);
      if($comment){
        foreach ($comment as $cmt ) {
          // CEK USER UNTUK UPDATE STATUS READ
          if($user_role == 1){
            $this->db->set('is_owner_readed',1);
          }elseif($user_role == 2){
            $this->db->set('is_manager_readed',1);
          }elseif($user_role == 3){
            $this->db->set('is_manager2_readed',1);
          }else{
            $this->db->set('is_user_readed',1);
          }
          $this->db->where('id',$report_id);
          $this->db->update('reports');
          
          // CEK USER UNTUK MELETAKKAN KANAN KIRI KOMEN
          if($user_sess == $cmt->user_id){
            $c_position = 'comment-other';
            $flex = 'end';
            $name = 'Saya';
          }else{
            $c_position = 'comment-self';
            $flex = 'start';
            $name = $cmt->fullname;
          }
          echo '
          <div class="row no-gutters justify-content-'.$flex.'" id="">
          <div class="col-10 col-lg-6 '.$c_position.' px-3">
          <span class="d-block">'.$cmt->comment_text.'</span>
          <div class="d-flex align-items-end">
          <small class="fullname mr-2">'.$name.'</small>
          <small class="time mr-2">'.date('d-m-Y',$cmt->comment_time).'</small>               
          </div>
          </div>
          </div>
          ';
        }
      }
    }
  }