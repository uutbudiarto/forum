<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Detail Pengumuman</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <h4 class="judul"><?=$detail_pop->ann_title ?></h4>
  <p class="isi"><?=$detail_pop->ann_text ?></p>
  <div class="text-right">
    <small class="text-secondary d-block tanggal"><?= date('d-m-Y',$detail_pop->time_created) ?></small>
    <span class="pembuat"><?=$detail_pop->fullname ?></span>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Tutup</button>
</div>