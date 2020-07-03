<h3 class="px-2 pb-3 pt-2 mb-3 text-secondary border-bottom text-center">Buat Pengumuman</h3>
<?=$this->session->flashdata('message'); ?>

<?=form_open('announcement/edit/', 'class="ann_form" id="ann_form"') ?>
<input type="hidden" value="<?=$ann_det->ann_id; ?>" name="id">
  <div class="p-1 px-lg-5 pt-lg-5">
    <div class="form-group">
      <input type="text" class="form-control <?php if(form_error('ann_title')){echo 'is-invalid';} ?> input-bottom-border" id="ann_title" name="ann_title" placeholder="Judul Pengumuman" value="<?=$ann_det->ann_title; ?>" autofocus>
      <?=form_error('ann_title','<div class="invalid-feedback text-right">','</div>') ?>
    </div>
    <div class="row no-gutters justify-content-end">
      <div class="col-5">
        <div class="form-group">
        <select class="custom-select <?php if(form_error('urgency')){echo 'is-invalid';} ?> input-bottom-border" name="urgency" id="urgency">
          <?php if($ann_det->urgency === 'info') : ?>
            <option value="info" selected>Low</option>
            <option value="warning">Medium</option>
            <option value="danger">High</option>
          <?php elseif($ann_det->urgency === 'warning') : ?>
            <option value="info">Low</option>
            <option value="warning" selected>Medium</option>
            <option value="danger">High</option>
          <?php elseif($ann_det->urgency === 'danger') : ?>
            <option value="info">Low</option>
            <option value="warning">Medium</option>
            <option value="danger" selected>High</option>
          <?php else : ?>
            <option value="info">Low</option>
            <option value="warning">Medium</option>
            <option value="danger">High</option>
          <?php endif; ?>
        </select>
        <?=form_error('urgency','<div class="invalid-feedback text-right">','</div>') ?>
      </div>
      </div>
    </div>
    <div class="form-group">
      <textarea name="ann_text" id="ann_text" rows="2" class="form-control onfocused <?php if(form_error('ann_text')){echo 'is-invalid';} ?> input-bottom-border" placeholder="Isi Pengumuman"><?=$ann_det->ann_text?></textarea>
      <?=form_error('ann_text','<div class="invalid-feedback text-right">','</div>') ?>
    </div>
    <div class="text-right">
      <a href="<?=base_url('announcement'); ?>" class="btn btn-secondary px-4">Batal</a>
      <button class="btn btn-primary px-3"><i class="fas fa-bullhorn"></i> Siarkan</button>
    </div>
  </div>
  <?= form_close(); ?>

  <pre>
    <?php print_r($ann_det) ?>
  </pre>



<script type="text/javascript">
  $('#ann_text').on('focus',function () {
    $(this).addClass('onfocused');
  });
</script>