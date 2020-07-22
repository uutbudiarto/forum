<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_m extends CI_Model {
  public function getMyProfile()
  {
    $this->db->select('
    users.fullname,
    users.email,
    users.phone,
    users.image,
    position.position_name,
    position.indicator
    ');
    $this->db->from('users');
    $this->db->join('position','position.id = users.position_id');
    $this->db->where('email',$this->session->userdata('email'));
    return $this->db->get()->row();
  }
  public function getMyReport()
  {
    $userId = $this->session->userdata('user_id');
    $this->db->select('
    reports.id as report_id,
    users.fullname,
    users.image as user_image,
    reports.report_text,
    reports.report_image,
    reports.report_file,
    reports.time_created,
    reports.count_comment,
    reports.is_active,
    reports.count_comment_user
    ');
    $this->db->from('reports');
    $this->db->join('users','users.id = reports.user_id');
    $this->db->where('user_id',$userId);
    $this->db->where('reports.is_active',1);
    $this->db->limit(4);
    $this->db->order_by('reports.time_created','DESC');
    return $this->db->get();
  }

  public function getAllMyReport()
  {
    $userId = $this->session->userdata('user_id');
    $this->db->select('
    reports.id as report_id,
    users.fullname,
    users.image as user_image,
    reports.report_text,
    reports.report_image,
    reports.report_file,
    reports.time_created,
    reports.count_comment,
    reports.is_active,
    reports.count_comment_user
    ');
    $this->db->from('reports');
    $this->db->join('users','users.id = reports.user_id');
    $this->db->where('user_id',$userId);
    $this->db->where('reports.is_active',1);
    $this->db->order_by('reports.time_created','DESC');
    return $this->db->get();
  }
  public function getMyCountReport()
  {
    $userId = $this->session->userdata('user_id');
    $this->db->select('
    reports.id as report_id,
    users.fullname,
    users.image as user_image,
    reports.report_text,
    reports.report_image,
    reports.report_file,
    reports.time_created,
    reports.count_comment,
    reports.is_active,
    reports.is_owner_readed,
    reports.is_manager_readed,
    ');
    $this->db->from('reports');
    $this->db->join('users','users.id = reports.user_id');
    $this->db->where('user_id',$userId);
    $this->db->where('reports.is_active',1);
    $this->db->order_by('reports.time_created','DESC');
    return $this->db->get()->num_rows();
  }
  
  public function editMyProfile($data)
  {
    $user = $this->db->get_where('users',['id' => $this->session->userdata('user_id')])->row();
    $image_name = $_FILES['image']['name'];
    if ($image_name) {
      // upload foto
      $config['upload_path'] = './assets/img/profile/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $this->load->library('upload',$config);

      if ($user->image != 'default.png') {
        unlink(FCPATH . 'assets/img/profile/' . $user->image);
      }

      if ($this->upload->do_upload('image')) {
        $new_image = $this->upload->data('file_name');
        $this->db->set('image',$new_image);
      }else{
        echo $this->upload->display_errors();
      }
    }
    $this->db->set('fullname',$data['fullname']);
    $this->db->set('phone',$data['phone']);
    $this->db->where('id',$this->session->userdata('user_id'));
    $this->db->update('users');
    if($this->db->affected_rows() > 0){
      return true;
    }
  }
  public function getPosition()
  {
    return $this->db->get('position')->result();
  }

  public function updatePassword($newpass)
  {
    $user = $this->db->get_where('users',['id' => $newpass['user_id']])->row();
    // cek password saat ini
    if (password_verify($newpass['current-pass'],$user->password)) {
      if($newpass['current-pass'] == $newpass['new-pass']){
        $this->session->set_flashdata('message','
        <div class="alert alert-danger rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Error!</strong> Password baru tidak boleh sama dengan password saat ini
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
        redirect('profile/change_password');
      }else{
        $new_password = password_hash($newpass['new-pass'], PASSWORD_DEFAULT);
        $this->db->set('password',$new_password);
        $this->db->where('id',$newpass['user_id']);
        $this->db->update('users');
        if($this->db->affected_rows() > 0){
          return true;
        }
      }
    }else{
      $this->session->set_flashdata('message','
        <div class="alert alert-danger rounded-0 alert-dismissible slideInDown1 show" role="alert">
          <strong>Error!</strong> Password saat ini salah
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ');
      redirect('profile/change_password');
    }
  }


  public function resetNotifByProfileForAdmin($reportId)
  {
    $report = $this->db->get_where('reports',['id'=>$reportId])->row();
    if($this->session->userdata('user_id') == $report->user_id){
      $this->db->set('count_comment_user',1);
      $this->db->where('id',$report->id);
      $this->db->update('reports');
      if($this->db->affected_rows() > 0){
        return true;
      }
    }
  }
}