<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Announcement_m','ann');
  }

  public function index()
  {
    is_logged_in();
    $data = [
      'title' => 'Announcement',
      'ann' => $this->ann->getAnn()
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('index',$data);
    $this->load->view('templates/footer');
  }

  public function detail($ann_id)
  {
    is_logged_in();
    $data = [
      'title' => 'Announcement',
      'ann_det' => $this->ann->getAnnById($ann_id)
    ];
    $this->load->view('templates/header',$data);
    $this->load->view('detail',$data);
    $this->load->view('templates/footer');
  }
  public function edit()
  {  
    is_logged_in();
    $data = [
      'title' => 'Announcement',
    ];

    $message = [
      'required' => 'silahkan isi %s'
    ];

    $this->form_validation->set_rules('urgency','urgensi','required|trim',$message);
    $this->form_validation->set_rules('ann_title','judul','required|trim',$message);
    $this->form_validation->set_rules('ann_text','isi pengumuman','required|trim',$message);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header',$data);
      $this->load->view('create',$data);
      $this->load->view('templates/footer');
    }else{
      $data = [
        'id' => $this->input->post('id',true),
        'urgency' => $this->input->post('urgency',true),
        'ann_title' => $this->input->post('ann_title',true),
        'ann_text' => $this->input->post('ann_text',true),
        'updated_at' => date('Y-m-d')
      ];
      $this->ann->editAnn($data);
    }
  }
  public function create()
  {
      is_logged_in();
      $data = [
        'title' => 'Announcement',
      ];

      $message = [
        'required' => 'silahkan isi %s'
      ];

      $this->form_validation->set_rules('urgency','urgensi','required|trim',$message);
      $this->form_validation->set_rules('ann_title','judul','required|trim',$message);
      $this->form_validation->set_rules('ann_text','isi pengumuman','required|trim',$message);

      if ($this->form_validation->run() == false) {
        $this->load->view('templates/header',$data);
        $this->load->view('create',$data);
        $this->load->view('templates/footer');
      }else{
        $data = [
          'user_id' => $this->session->userdata('user_id'),
          'role_id' => $this->session->userdata('role_id'),
          'urgency' => $this->input->post('urgency',true),
          'ann_title' => $this->input->post('ann_title',true),
          'ann_text' => $this->input->post('ann_text',true),
          'time_created' => time(),
          'created_at' => date('Y-m-d'),
          'updated_at' => date('Y-m-d'),
          'is_active' => 1
        ];
        $this->ann->createAnn($data);
      }
  }

  public function delete()
  {
    is_logged_in();
    $id = $this->input->post('ann-id-act',true);
    if($id == null){
      redirect('announcement');
    }else{
      $this->db->where('id',$id);
      $this->db->set('is_active',0);
      $this->db->update('announcement');
      if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('message','
        <div class="alert alert-success rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
          <strong>Berhasil !</strong> Menghapus pengumuman
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('announcement');
      }else{
        $this->session->set_flashdata('message','
        <div class="alert alert-danger rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
          <strong>Gagal !</strong> Menghapus pengumuman
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('announcement');
      }
    }
  }
}