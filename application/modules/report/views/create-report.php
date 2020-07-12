<div class="write-report-box p-2">
  <!-- <h5 class="text-center text-secondary border-bottom pb-3">Buat Laporan</h5> -->
  <?= form_open('report/create',"id='form_report'"); ?>
  <div class="form-group mt-5">
    <textarea name="report-text" id="report-text" class="report-text focused" placeholder="Buat Laporan disini..." autofocus></textarea>
    <?= form_error('report-text','<small class="text-danger">','</small>'); ?>
  </div>

  <div class="form-group d-flex justify-content-end align-items-center">
    <div class="right">
      <button class="btn btn-sm btn-primary" onclick="playsoundRep()">Kirim <i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
  <?= form_close(); ?>
</div>


<script>
  function playsoundRep() {
    const audio = new Audio('<?=base_url('assets/audio/1.mp3')?>');
    audio.volume = 1;
    audio.play();
    // alert('OK')
  }

  $('.report-text').on('focus',function () {
    $(this).addClass('focused');
  })
  $('.report-text').on('focusout',function () {
    $(this).removeClass('focused');
  })
</script>