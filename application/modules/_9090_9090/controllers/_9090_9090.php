<?php
class _9090_9090 extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('_9090_9090_m','model');
  }
  public function index()
  {
    is_logged_in();
    if($this->session->userdata('role_id') == 3){
      redirect('profile');
    }
    $data = [
      'title' => 'User Register',
      'position' => $this->model->getAllPosition()
    ];
    $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[users.email]',[
      'is_unique' => 'email sudah terdaftar!'
    ]);
    $this->form_validation->set_rules('fullname','fullname','trim|required');
    $this->form_validation->set_rules('phone','phone','trim|required|numeric|is_unique[users.phone]',[
      'is_unique' => 'telepon sudah terdaftar !'
    ]);
    $this->form_validation->set_rules('position','position','trim|required');

    if ($this->form_validation->run() == false) {
      $this->load->view('index',$data);
    }else{
      $data = [
        'email' => $this->input->post('email',true),
        'phone' => $this->input->post('phone',true),
        'password' => password_hash('111222', PASSWORD_DEFAULT),
        'fullname' => $this->input->post('fullname',true),
        'image' => 'default.png',
        'position_id' => $this->input->post('position',true),
        'role_id' => 3,
        'date_created' => time(),
        'created_at' => date('Y-m-d',time()),
        'updated_at' => date('Y-m-d',time()),
        'is_active' => 1,
      ];
      $this->model->daftarUser($data);
    }
  }
}
