<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model
{
  public function registerUser($data)
  {
    $this->db->insert('users',$data);
    if ($this->db->affected_rows() > 0) {
      return true;
    }
  }

  public function loginUser($data)
  {
    // cek user is exi
    $row = $this->db->get_where('users',['email' => $data['email']]);
    if ($row->num_rows() > 0) {
      // cek act
      if ($row->row()->is_active == 1) {
        // cek pass
        if (password_verify($data['password'],$row->row()->password)) {

          // cek user role
          if($row->row()->role_id == 3){
            $this->db->where('is_active',1);
            $menu = $this->db->get_where('menus',['role_id' => $row->row()->role_id])->result();
          }else{
            $this->db->where('is_active',1);
            $menu = $this->db->get('menus')->result();
          }

          // take menu to session
          $sess_user = [
            'email' => $row->row()->email,
            'role_id' => $row->row()->role_id,
            'user_id' => $row->row()->id,
            'image_user_login' => $row->row()->image,
            'menu_user' => $menu
          ];
          $this->session->set_userdata($sess_user);
          redirect('profile');
        }else{
          $this->session->set_flashdata('pass_err','<span class="badge badge-error badge-danger">Password Salah !</span>');
          redirect('auth');
        }
      }else{
        $this->session->set_flashdata('email_err','<span class="badge badge-error badge-danger">Email tidak aktif !</span>');
        redirect('auth');
      }
    }else{
      $this->session->set_flashdata('email_err','<span class="badge badge-error badge-danger">Email tidak terdaftar !</span>');
      redirect('auth');
    }
  }
}
