<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_m','profile');
  }
  public function index()
  {
      is_logged_in();
      $data = [
        'title' => 'Profile',
        'profile' => $this->profile->getMyProfile(),
        'myreport' => $this->profile->getMyReport()->result(),
        'countreport' => $this->profile->getMyReport()->num_rows(),
      ];
      $this->load->view('templates/header',$data);
      $this->load->view('index',$data);
      $this->load->view('templates/footer');
  }
  public function edit()
  {
    is_logged_in();
    $data = [
      'title' => 'Profile',
      'profile' => $this->profile->getMyProfile(),
      'position' => $this->profile->getPosition()
    ];

    $this->form_validation->set_rules('fullname','Nama Lengkap','required|alpha_numeric_spaces',[
      'required' => '%s tidak boleh kosong!',
      'alpha_numeric_spaces' => '%s hanya boleh huruf!',
    ]);
    $this->form_validation->set_rules('phone','Nomor Telepon','required|numeric|min_length[9]|max_length[13]',[
      'required' => '%s tidak boleh kosong!',
      'numeric' => '%s hanya boleh angka!',
      'min_length' => '%s minimal 9 angka!',
      'max_length' => '%s maksimal 13 angka!',
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header',$data);
      $this->load->view('edit-profile',$data);
      $this->load->view('templates/footer');
    }else{
      $data = [
        'phone' => $this->input->post('phone',true),
        'fullname' => $this->input->post('fullname',true),
        'image' => $_FILES
      ];
      $results = $this->profile->editMyProfile($data);
      if ($results) {
        $this->session->set_flashdata('message','
        <div class="alert alert-success rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Success</strong> update profile berhasil
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('profile');
      }
    }
  }
  public function change_password()
  {
    is_logged_in();
    $data = [
      'title' => 'Profile',
    ];

    $this->form_validation->set_rules('current-pass','password saat ini','required|trim',[
      'required' => 'silahkan masukan %s'
    ]);
    $this->form_validation->set_rules('new-pass','password baru','required|trim|min_length[6]',[
      'required' => 'silahkan masukan %s!',
      'min_length' => '%s minimal 6 digit!',
    ]);
    $this->form_validation->set_rules('conf-pass','konfirmasi password','required|trim|matches[new-pass]',[
      'required' => 'silahkan %s!',
      'matches' => '%s tidak sesuai !'
    ]);
    
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header',$data);
      $this->load->view('edit-password',$data);
      $this->load->view('templates/footer');
    }else{
      $newpass = [
        'current-pass' => $this->input->post('current-pass',true),
        'new-pass' => $this->input->post('new-pass',true),
        'conf-pass' => $this->input->post('conf-pass',true),
        'user_id' => $this->session->userdata('user_id')
      ];
      $results = $this->profile->updatePassword($newpass);
      if ($results) {
        $this->session->set_flashdata('message','
        <div class="alert alert-success rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Success!</strong> Password berhasil diubah, Silahkan Login Kembali
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('role_id');
      $this->session->unset_userdata('menu_user');
      redirect('auth');
      }
    }
  }
}