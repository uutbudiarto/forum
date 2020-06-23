<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Announcement_m','announ');
  }
  public function create()
  {
      is_logged_in();
      $data = [
        'title' => 'Announcement',
      ];

      $message = [
        'required' => 'silahkan pilih %s'
      ];

      $this->form_validation->set_rules('urgency','urgensi','required|trim',$message);
      $this->form_validation->set_rules('ann_title','judul','required|trim',$message);
      $this->form_validation->set_rules('ann_text','isi pengumuman','required|trim',$message);

      if ($this->form_validation->run() == false) {
        $this->load->view('templates/header',$data);
        $this->load->view('index',$data);
        $this->load->view('templates/footer');
      }else{
        echo 'OK';
      }
  }
}