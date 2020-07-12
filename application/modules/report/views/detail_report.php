<div class="box">
  <div class="detail-report pb-3 border-bottom mb-3">
    <input type="hidden" id="report_id" value="<?=$dtl_report->report_id ?>">
    <div class="row no-gutters border-top">
      <div class="col-md-2 col-2">
        <img src="<?=base_url('assets/img/profile/').$dtl_report->user_image ?>" class="card-img mt-3">
      </div>
      <div class="col-md-10 col-10">
        <div class="card-body">
          <h6 class="card-title"><?=$dtl_report->fullname ?></h6>
          <span class="card-text d-block"><?=$dtl_report->report_text ?></span>
          <small class="text-muted"><?=date('d m Y',$dtl_report->time_created) ?></small>
        </div>
      </div>
    </div>
  </div>
  <div class="box-tanggapan">
    <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 155px)">
      <img width="100px" height="100px" src="<?=base_url()?>assets/loader/2.gif" alt="">
    </div>
  </div>
  <div class="box-input-komen border-top bg-white">
    <div class="input-group">
      <textarea class="form-control border-0" id="isi-komentar" autofocus placeholder="balas..."></textarea>
      <div class="input-group-append">
        <button class="btn btn-primary rounded-0" id="btnKirimKomen"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>     
  </div>
</div>

<script type="text/javascript">
function playsoundErr() {
  const audio = new Audio('<?=base_url('assets/audio/err.mp3')?>');
  audio.volume = 1;
  audio.play();
}
function playsoundOk() {
  const audio = new Audio('<?=base_url('assets/audio/__send.mp3')?>');
  audio.volume = 1;
  audio.play();
}

$('document').ready(function () {  
  commentReport()
})
function commentReport() {
  const reportId = $('#report_id').val();
  $.ajax({
    url : '<?=base_url()?>report/comment_report/'+reportId,
    type : 'GET',
    success: function (result) {
      $('.box-tanggapan').html(result)
    }
  })
}

$('#btnKirimKomen').on('click',function () {
  if($('#isi-komentar').val() == ''){
    $('#isi-komentar').addClass('is-invalid');
    playsoundErr();
  }else{
    $.ajax({
    url : '<?=base_url()?>report/buat_komentar/',
    type:'POST',
    data:{
      'comment_text' : $('#isi-komentar').val(),
      'report_id' : $('#report_id').val(),
    },
    success: function (result) {
      playsoundOk();
      $('#isi-komentar').val('');
      $('#isi-komentar').removeClass('is-invalid');
    }
  })
  }
})

let myInt = setInterval(() => {
  commentReport();
}, 1000);
</script>

