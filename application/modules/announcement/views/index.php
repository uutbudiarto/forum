<?=$this->session->flashdata('message'); ?>
<div class="row no-gutters p-2">
  <div class="col-8">
    <?php if($ann) : ?>
    <h5 class="text-center pt-2 pb-3 border-bottom">List Pengumuman Anda</h5>
    <?php else: ?>
      <h6 class="text-center pt-2 pb-3 border-bottom">Anda Belum membuat pengumumman</h6>
    <?php endif; ?>
  </div>
  <div class="col-4 text-right">
    <a href="<?=base_url('announcement/create/') ?>" class="btn btn-sm btn-primary">Buat</a>
  </div>
  <div class="col-12 p-2">
    <div class="list-group">
      <?php foreach($ann as $an) : ?>
        <?php if($this->session->userdata('user_id') == $an->user_id) : ?>
        <button class="list-group-item btn list-group-item-action btn-action my-2 shadow-sm border-0" data-toggle="modal" data-target="#action" data-id=<?=$an->ann_id; ?>>
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?=$an->ann_title; ?></h5>
            <small><?=date('Y-m-d',$an->time_created) ?></small>
          </div>
          <p class="mb-1">
            <?=$an->ann_text; ?>
          </p>
          <span class="badge badge-<?=$an->urgency?> badge-pill">-</span>
          <small class="d-block text-right">Di Buat Oleh : <?=$an->fullname; ?></small>
        </button>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal zoomIn" id="action">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header p-1">
        <h5 class="modal-title">Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center d-flex justify-content-between">
        <a href="javascript:void(0)" class="btn px-4 text-white btn-warning btn-ubah">Edit</a>
        <?=form_open('announcement/delete')?>
        <input type="hidden" name="ann-id-act" id="ann-id-act">
          <button type="submit" class="btn px-4 btn-danger btn-hapus">Hapus</button>
        <?=form_close();?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.btn-action').on('click',function () {
    const annId = $(this).data('id');
    $('#ann-id-act').val(annId);
  })

  $('.btn-ubah').on('click',function () {
    const annId = $('#ann-id-act').val();
    window.location.href = '<?=base_url('announcement/detail/')?>'+annId;
  })
</script>