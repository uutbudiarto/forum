<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {
  public function createReport($report)
  {
    $this->db->insert('reports',$report);
    if($this->db->affected_rows() > 0){
      return true;
    }
  }

  public function getAllReport()
  {
    // JIKA USER ROLE BUKAN 4 MAKA GET SEMUA REPORT
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if($roleId != 4){
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }else{
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }
  }

  // CARI REPORT
  public function seachReport($keyword)
  {
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if($roleId != 4){
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->like('report_text',$keyword);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }else{
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->like('report_text',$keyword);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }
  }

  // FILTER BY USER
  public function getReportByUser($emp_id)
  {
    $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
    ');
    $this->db->from('reports');
    $this->db->join('users','users.id = reports.user_id');
    $this->db->where('reports.user_id',$emp_id);
    $this->db->where('reports.is_active',1);
    $this->db->order_by('reports.time_created','DESC');
    return $this->db->get()->result();
  }

  public function getReportByDate($date)
  {  
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if($roleId != 4){
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->where('reports.created_at >=',$date['start_date']);
      $this->db->where('reports.created_at <=',$date['end_date']);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }else{
      $this->db->select('
      reports.id as report_id,
      users.id as user_id,
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
      reports.is_manager2_readed,
      reports.is_user_readed,

      reports.count_comment_owner,
      reports.count_comment_manager,
      reports.count_comment_manager2,
      reports.count_comment_user,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->where('reports.created_at >=',$date['start_date']);
      $this->db->where('reports.created_at <=',$date['end_date']);
      $this->db->order_by('reports.time_updated','DESC');
      return $this->db->get()->result();
    }
  }

  public function getReportById($report_id)
  {
    // RESET KOMEN COUNT BERDASRKAN USER LOGIN DAN ROLE
    $this->_resetNotifReport($report_id);

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
      $this->db->where('reports.id',$report_id);
      $this->db->where('reports.is_active',1);
      return $this->db->get()->row();
  }

  public function getCommentByIdReport($report_id)
  {
    $this->db->select('
      users.id as user_id,
      users.fullname,
      users.image as user_image,
      comment_reports.id as comment_id,
      comment_reports.comment_text,
      comment_reports.time_created as comment_time,
      comment_reports.user_id as user_comment,
    ');
    $this->db->from('comment_reports');
    $this->db->join('users','users.id = comment_reports.user_id');
    $this->db->where('report_id',$report_id);
    $this->db->order_by('time_created','ASC');
    return $this->db->get()->result();
  }

  public function postKomentar($data)
  {
    $this->db->insert('comment_reports',$data);

    // CEK ROLE UNTUK UPDATE INDIKATOR BACA KOMEN
    $this->_resetNotifKomen($data['report_id']);

    // CARI JUMLAH KOMEN SAAT INI LALU DITAMBAH 1
    $row = $this->db->get_where('reports',['id' => $data['report_id']])->row();
    $old_count_comment = $row->count_comment;
    $new_count_comment = $old_count_comment + 1;

    // UPDATE JUMLAH KOMEN
    $this->db->where('id',$data['report_id']);
    $this->db->set('count_comment',$new_count_comment);
    $this->db->update('reports');

    // UPDATE TIME KE TABEL REPORT
    $this->db->where('id',$row->id);
    $this->db->set('time_updated',time());
    $this->db->update('reports');
  }

  private function _resetNotifReport($report_id)
  {
    $roleId = $this->session->userdata('role_id');
    // update indikator baca sesuai user role yg login
    if ($roleId == 1) {
      $this->db->set('is_owner_readed',1);
      $this->db->set('count_comment_owner',1);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else if($roleId == 2){
      $this->db->set('is_manager_readed',1);
      $this->db->set('count_comment_manager',1);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else if($roleId == 3){
      $this->db->set('is_manager2_readed',1);
      $this->db->set('count_comment_manager2',1);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else{
      $this->db->set('is_user_readed',1);
      $this->db->set('count_comment_user',1);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }
    if($this->db->affected_rows() > 0){
      return true;
    }
  }

  private function _resetNotifKomen($report_id)
  {
    $roleId = $this->session->userdata('role_id');
    if ($roleId == 1) {
      $this->db->set('count_comment_owner',1);
      $this->db->set('count_comment_manager',0);
      $this->db->set('count_comment_manager2',0);
      $this->db->set('count_comment_user',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else if($roleId == 2){
      $this->db->set('count_comment_owner',0);
      $this->db->set('count_comment_manager',1);
      $this->db->set('count_comment_manager2',0);
      $this->db->set('count_comment_user',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else if($roleId == 3){
      $this->db->set('count_comment_owner',0);
      $this->db->set('count_comment_manager',0);
      $this->db->set('count_comment_manager2',1);
      $this->db->set('count_comment_user',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else{
      $this->db->set('count_comment_owner',0);
      $this->db->set('count_comment_manager',0);
      $this->db->set('count_comment_manager2',0);
      $this->db->set('count_comment_user',1);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }
  }


  public function getEmp()
  {
    $this->db->where('position_id !=',1);
    return $this->db->get('users')->result();
  }
}