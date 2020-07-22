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

  public function get_new_ann()
  {
    $ann = $this->ann->getAnn();
    echo '
    <div class="my-alert rounded-0 shadow mx-2 mt-3 alert-dismissible show" role="alert">
      <h5 class="text-center text-white">
        <span class="badge bg-white text-'.$ann[0]->urgency.' rounded-0 pr-3 mr-2 py-2 float-left" style="clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%); font-weight: 400; font-size: 16px;">Terbaru</span>
        <i class="fas fa-bullhorn"></i> PENGUMUMAN</h5>
      <strong class="text-white">'.$ann[0]->ann_title.'</strong>
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="text-an text-white">
        '.$ann[0]->ann_text.'
      </div>
      <div class="text-white mt-5">
        <span>TTD</span>
        <p>'.date('Y-m-d',$ann[0]->time_created).'</p>
        <span>'.$ann[0]->fullname.'</span>
      </div>
    </div>
    ';
  }
  public function get_old_ann()
  {
    $old_ann = $this->ann->getAnn();
    foreach ($old_ann as $ann) {
      if($ann->ann_id != $old_ann[0]->ann_id){
        $this->_result_ann($ann);
      }
    }
  }
  private function _result_ann($ann){
    $rep = substr($ann->ann_text,0 ,30);
    if($ann->time_exp > time()){
      echo '
        <a href="#" class="list-group-item border-bottom shadow-sm list-group-item-action list-ann"
        onclick="detail_ann('.$ann->ann_id.')"
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">'.$ann->ann_title.'</h5>
            <small class="text-muted">'.date('Y-m-d',$ann->time_created).'</small>
          </div>
          <p>'.$rep.'...'.'</p>
          <small class="text-muted">'.$ann->fullname.'</small>
        </a>
      ';
    }
  }

  public function load_detail_ann($ann_id)
  {
    $data['detail_pop'] = $this->ann->getAnnById($ann_id);
    $this->load->view('modal/detail-ann',$data);
  }
}