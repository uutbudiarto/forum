<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {

  public function getEmp()
  {
    $this->db->where('position_id !=',1);
    return $this->db->get('users')->result();
  }

  public function getLaporan()
  {
    //cek level user
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if ($roleId == 3 ) {
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
      reports.count_comment_user as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }else if($roleId == 2){
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
      reports.count_comment_manager as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
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
      reports.count_comment_owner as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }
  }

  public function getLaporanById($report_id)
  {
    $roleId = $this->session->userdata('role_id');
    // update indikator baca sesuai user role yg login
    if ($roleId == 1) {
      $this->db->set('is_owner_readed',1);
      $this->db->set('count_comment_owner',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else if($roleId == 2){
      $this->db->set('is_manager_readed',1);
      $this->db->set('count_comment_manager',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }else{
      $this->db->set('count_comment_user',0);
      $this->db->where('id',$report_id);
      $this->db->update('reports');
    }
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

  public function getCommentByReportId($report_id)
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

  public function createComment($data)
  {
    $rowreport = $this->db->get_where('reports',['id' => $data['report_id']])->row();
    $new_count_comment = $rowreport->count_comment + 1;
    $new_count_comment_owner = $rowreport->count_comment_owner + 1;
    $new_count_comment_manager = $rowreport->count_comment_manager + 1;
    $new_count_comment_user = $rowreport->count_comment_user + 1;
    $this->db->insert('comment_reports',$data);
    if ($this->db->affected_rows() > 0) {
      $this->db->set('count_comment',$new_count_comment);
      $this->db->set('count_comment_owner',$new_count_comment_owner);
      $this->db->set('count_comment_manager',$new_count_comment_manager);
      $this->db->set('count_comment_user',$new_count_comment_user);
      $this->db->where('id',$data['report_id']);
      $this->db->update('reports');
      redirect('laporan/get_laporan_by_id/'.$data['report_id'].'#_9090');
    }
  }


  // filter report
  public function getLaporanByEmp($emp_id)
  {  
    //cek level user
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if ($roleId == 3 ) {
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
      reports.count_comment_user as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('user_id',$userId);
      $this->db->where('reports.user_id',$emp_id);
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }else if($roleId == 2){
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
      reports.count_comment_manager as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->where('reports.user_id',$emp_id);
      $this->db->order_by('reports.time_created','DESC');
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
      reports.count_comment_owner as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.is_active',1);
      $this->db->where('reports.user_id',$emp_id);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }
  }
  public function getLaporanByKeyword($keyword)
  {  
    //cek level user
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if ($roleId == 3 ) {
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
      reports.count_comment_user as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->like('users.fullname',$keyword);
      $this->db->or_like('reports.report_text',$keyword);
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }else if($roleId == 2){
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
      reports.count_comment_manager as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->like('users.fullname',$keyword);
      $this->db->or_like('reports.report_text',$keyword);
      $this->db->where('reports.is_active',1);      
      $this->db->order_by('reports.time_created','DESC');
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
      reports.count_comment_owner as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->like('users.fullname',$keyword);
      $this->db->or_like('reports.report_text',$keyword);
      $this->db->where('reports.is_active',1);      
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }
  }
  public function getLaporanByDate($date)
  {  
    //cek level user
    $roleId = $this->session->userdata('role_id');
    $userId = $this->session->userdata('user_id');
    if ($roleId == 3 ) {
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
      reports.count_comment_user as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.created_at >=',$date['start_date']);
      $this->db->where('reports.created_at <=',$date['end_date']);
      $this->db->where('user_id',$userId);
      $this->db->where('reports.is_active',1);
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }else if($roleId == 2){
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
      reports.count_comment_manager as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.created_at >=',$date['start_date']);
      $this->db->where('reports.created_at <=',$date['end_date']);
      $this->db->where('reports.is_active',1);      
      $this->db->order_by('reports.time_created','DESC');
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
      reports.count_comment_owner as new_comment_unread,
      reports.is_active,
      reports.is_owner_readed,
      reports.is_manager_readed,
      ');
      $this->db->from('reports');
      $this->db->join('users','users.id = reports.user_id');
      $this->db->where('reports.created_at >=',$date['start_date']);
      $this->db->where('reports.created_at <=',$date['end_date']);
      $this->db->where('reports.is_active',1);      
      $this->db->order_by('reports.time_created','DESC');
      return $this->db->get()->result();
    }
  }
}
