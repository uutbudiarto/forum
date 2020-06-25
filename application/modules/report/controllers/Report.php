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
      'reports' => $this->report->getReport()
    ];
    
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }

  public function read($report_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Report',
      'report' => $this->report->readReport($report_id),
      'comment' => $this->report->getCommentByReportId($report_id)
    ];  
    $this->load->view('templates/header',$data);
    $this->load->view('read-report',$data);
    $this->load->view('templates/footer');
  }

  public function create_comment()
  {
    $data = [
      'comment_text' => $this->input->post('comment_text'),
      'report_id' => $this->input->post('report_id'),
      'user_id' => $this->session->userdata('user_id'),
      'role_id' => $this->session->userdata('role_id'),
      'like_indicator' => 5,
      'time_created' => time(),
      'created_at' => date('Y-m-d',time()),
      'updated_at' => date('Y-m-d',time()),
      'is_active' => 1,
    ];
    $this->report->createComment($data);
  }

  public function filter()
  {
    is_logged_in();
    $filter = [
      'start_date' => $this->input->post('start_date',true),
      'end_date' => $this->input->post('end_date',true)
    ];
    $data = [
      'title' => 'Report'
    ];
    if ($filter['start_date'] && $filter['end_date']) {
      $data['reports'] = $this->report->filterByDate($filter);
      $this->load->view('templates/header',$data);
      $this->load->view('index',$data);
      $this->load->view('templates/footer');
    }else{
      redirect('report');
    }
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
      'count_comment' => 0,
    ];
    
    $this->form_validation->set_rules('report-text','laporan','required|trim|min_length[10]',[
      'required' => 'kamu belum menulis %s apapun',
      'min_length' => 'kamu setidaknya menulis 10 karakter'
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
  }