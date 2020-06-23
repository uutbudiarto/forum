<h3 class="px-2 pb-3 pt-2 mb-3 text-secondary border-bottom text-center">Buat Pengumuman</h3>

<?=form_open('announcement/create/', 'class="ann_form" id="ann_form"') ?>
  <div class="p-1 px-lg-5 pt-lg-5">
    <div class="form-group">
      <input type="text" class="form-control <?php if(form_error('ann_title')){echo 'is-invalid';} ?> input-bottom-border" id="ann_title" name="ann_title" placeholder="Judul Pengumuman" value="<?= set_value('ann_title') ?>">
      <?=form_error('ann-title','<div class="invalid-feedback text-right">','</div>') ?>
    </div>
    <div class="row no-gutters justify-content-between">
      <div class="col-5">
        <div class="form-group">
        <select class="custom-select <?php if(form_error('urgency')){echo 'is-invalid';} ?> input-bottom-border" name="urgency" id="urgency">
          <option value="">Tipe Urgensi</option>
          <option value="info">Low</option>
          <option value="warning">Medium</option>
          <option value="danger">High</option>
        </select>
        <?=form_error('urgency','<div class="invalid-feedback text-right">','</div>') ?>
      </div>
      </div>
      <div class="col-6">
        <input type="date" class="form-control input-bottom-border" name="ann_date" id="ann_date" value="<?= set_value('ann_date') ?>">
      </div>
    </div>
    <div class="form-group">
      <textarea name="ann_text" id="ann_text" rows="2" class="form-control <?php if(form_error('ann_text')){echo 'is-invalid';} ?> input-bottom-border" placeholder="Isi Pengumuman"><?= set_value('ann_text');?></textarea>
      <?=form_error('ann_text','<div class="invalid-feedback text-right">','</div>') ?>
    </div>
    <div class="text-right">
      <a href="<?=base_url('profile'); ?>" class="btn btn-secondary px-4">Batal</a>
      <button class="btn btn-primary px-3"><i class="fas fa-bullhorn"></i> Siarkan</button>
    </div>
  </div>
  <?= form_close(); ?>



<script type="text/javascript">
  $('#ann-text').focus(function () {
    $(this).attr('rows',10);
  });
  $('#ann-text').focusout(function () {
    $(this).attr('rows',2);
  });
</script>