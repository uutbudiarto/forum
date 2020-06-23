<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {
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
}
