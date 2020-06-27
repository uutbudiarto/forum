<?php

class _9090_9090_m extends CI_Model 
{
  public function getAllPosition()
  {
    return $this->db->get('position')->result();
  }
  public function daftarUser($data)
  {
    $this->db->insert('users',$data);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('message','
      <div class="alert alert-success alert-dismissible fade slideInDown1 show" role="alert">
        <strong>Berhasil !</strong> mendaftarkan user
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      redirect('_9090_9090');
    }
  }
}
