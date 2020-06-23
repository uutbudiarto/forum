<div class="write-report-box p-2">
  <!-- <h3 class="text-center text-secondary border-bottom pb-3">Buat Laporan</h3> -->
  <?= form_open('report/create',"id='form_report'"); ?>

  <div class="form-group mt-5">
    <textarea name="report-text" id="report-text" class="report-text focused" placeholder="Buat Laporan disini..." autofocus><?=set_value('report-text');?></textarea>
    <?= form_error('report-text','<small class="text-danger">','</small>'); ?>
  </div>

  <div class="form-group d-flex justify-content-between align-items-center">
    <div class="left">
      <button class="btn text-secondary"><i class="fas fa-image"></i></button>
      <button class="btn text-secondary"><i class="fas fa-paperclip"></i> File</button>
    </div>
    <div class="right">
      <button class="btn btn-sm btn-primary">Kirim <i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
  <?= form_close(); ?>
</div>


<script>
  $('.report-text').on('focus',function () {
    $(this).addClass('focused');
  })
  $('.report-text').on('focusout',function () {
    $(this).removeClass('focused');
  })
</script>