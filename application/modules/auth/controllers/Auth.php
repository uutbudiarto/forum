<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_m','auth');
  }

	public function index()
	{
    is_logged_out();
    $data = [
      'title' => 'Halaman Login'
    ];

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
      'required' => '%s tidak boleh kosong !',
      'valid_email' => '%s tidak valid !'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required',[
      'required' => '%s tidak boleh kosong !'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('template/header',$data);
		  $this->load->view('index',$data);
		  $this->load->view('template/footer');
    }else{
      $data = [
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
      ];
      $results = $this->auth->loginUser($data);
    }
  }
	public function register()
	{
    $data = [
      'title' => 'Halaman Registrasi'
    ];
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',[
      'required' => '%s tidak boleh kosong !',
      'valid_email' => '%s tidak valid !',
      'is_unique' => '%s telah terdaftar !',
    ]);
    $this->form_validation->set_rules('phone', 'No Telepon', 'required|trim|is_unique[users.phone]|numeric|min_length[9]|max_length[13]',[
      'required' => '%s tidak boleh kosong !',
      'numeric' => '%s harus angka !',
      'is_unique' => '%s telah terdaftar !',
      'min_length' => '%s valid minimal 9 karakter !',
      'max_length' => '%s valid maksimal 13 karakter !',
    ]);
    $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required',[
      'required' => '%s tidak boleh kosong !'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]',[
      'required' => '%s tidak boleh kosong !',
      'min_length' => '%s minimal 6 karakter !',
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
      'required' => 'Silahkan konfirmasi %s !',
      'matches' => ' %s tidak sesuai !',
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header',$data);
      $this->load->view('register',$data);
      $this->load->view('template/footer');
    }else{
      $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
      $data = [
        'email' => $this->input->post('email',true),
        'phone' => $this->input->post('phone',true),
        'password' => $password,
        'fullname' => $this->input->post('fullname',true),
        'image' => 'default.png',
        'position_id' => 9,
        'role_id' => 3,
        'date_created' => date('Y/m/d',time()),
        'created_at' => time(),
        'updated_at' => time(),
        'is_active' => 1
      ];
      $results = $this->auth->registerUser($data);
      if ($results) {
        $this->session->set_flashdata('message','
        <div class="alert alert-success rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Success</strong> Registrsi berhasil
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('auth');
      }
    }
  }
  
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('menu_user');
    $this->session->set_flashdata('message','
    <div class="alert alert-success text-center rounded-0 alert-dismissible slideInDown1 show" role="alert">
      <strong>Sampai Jumpa</strong>
      <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    redirect('auth');
  }
}