<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_m extends CI_Model {

  public function getAnn()
  {
    $this->db->select('
      users.fullname,
      announcement.id as ann_id,
      announcement.user_id,
      announcement.role_id,
      announcement.urgency,
      announcement.ann_title,
      announcement.ann_text,
      announcement.time_created,
      announcement.time_exp,
    ');
    $this->db->from('announcement');
    $this->db->join('users','users.id = announcement.user_id');
    $this->db->where('announcement.is_active',1);
    $this->db->order_by('announcement.time_created','DESC');
    $this->db->limit(3);
    return $this->db->get()->result();
  }

  public function getAnnById($ann_id)
  {
    $this->db->select('
      users.fullname,
      announcement.id as ann_id,
      announcement.user_id,
      announcement.role_id,
      announcement.urgency,
      announcement.ann_title,
      announcement.ann_text,
      announcement.time_created,
    ');
    $this->db->from('announcement');
    $this->db->join('users','users.id = announcement.user_id');
    $this->db->where('announcement.id',$ann_id);
    $this->db->where('announcement.is_active',1);
    return $this->db->get()->row();
  }


  public function createAnn($data)
  {
    $this->db->insert('announcement',$data);
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('message','
      <div class="alert alert-success rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
        <strong>Berhasil !</strong> Membuat pengumuman
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('announcement');
    }else{
      $this->session->set_flashdata('message','
      <div class="alert alert-danger rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
        <strong>Gagal !</strong> Membuat pengumuman
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('announcement/create/');
    }
  }

  public function editAnn($data)
  {
    $this->db->set('urgency',$data['urgency']);
    $this->db->set('ann_title',$data['ann_title']);
    $this->db->set('ann_text',$data['ann_text']);
    $this->db->set('updated_at',$data['updated_at']);
    $this->db->where('id',$data['id']);
    $this->db->update('announcement');
    if($this->db->affected_rows() > 0){
      $this->session->set_flashdata('message','
      <div class="alert alert-success rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
        <strong>Berhasil !</strong> Merubah pengumuman
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('announcement');
    }else{
      $this->session->set_flashdata('message','
      <div class="alert alert-danger rounded-0 alert-dismissible fade slideInDown1 show" role="alert">
        <strong>Gagal !</strong> Merubah pengumuman
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('announcement');
    }
  }
}