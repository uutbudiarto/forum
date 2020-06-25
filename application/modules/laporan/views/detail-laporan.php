<div class="back-top row no-gutters p-3" id="_9090">
  <div class="col-1">
    <a href="<?=base_url('laporan/'); ?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="col-10">
  <img width="35" height="35" class="img-user-comment rounded-circle mr-2" src="<?=base_url('assets/img/profile/').$report->user_image; ?>" alt="">
    <h6 class="text-secondary">Laporan Dari : <?=$report->fullname ?></h6>
    <p class="card-text"><?=$report->report_text; ?></p>
    <small class="d-block text-secondary text-right"><?=date('D - d m Y',$report->time_created);?></small>
  </div>
</div>


<div class="box-comment-list-22 pt-2"></div>
<?= form_open('laporan/create_comment','id="form_comment"'); ?>
<div class="box-write-comment row no-gutters border-top justify-content-between" id="_9090">
  <div class="col-lg-10 col-9">
    <textarea name="comment-write" id="comment_write" class="form-control border-0" placeholder="Komentar..." rows="4" autofocus></textarea>
    <input type="hidden" name="report_id" class="report_id" value="<?=$report->report_id; ?>">
  </div>
  <div class="col-lg-2 col-3 text-right">
    <button class="btn btn-primary rounded-0 mt-3"><i class="fas fa-paper-plane"></i></button>
  </div>
</div>
<?= form_close(); ?>
  
  <input type="hidden" name="key_reporter" class="key_reporter" id="sendComment" value="<?=$this->session->userdata('user_id') ?>">
<script type="text/javascript">
  const reportId = $('.report_id').val();
  const keyReporter = $('.key_reporter').val();
  function getCommentByReportId() {
    $.ajax({
      'url' : '<?=base_url()?>laporan/get_comment_by_report_id/'+reportId,
      'type': 'GET',
      'success' : function(res){
        let html = '';
        if(res){
          const data = JSON.parse(res);
          data.forEach(d => {
            html += `
            ${(() => {
              if(keyReporter == d.user_id){
                return `
                <div class="row no-gutters justify-content-start list-comment-reporter" id="${d.comment_time}">
                  <div class="col-10 col-lg-8 comment-self px-3">
                    <span class="d-block">${d.comment_text}</span>
                    <small class="fullname">${d.fullname}</small>
                    <small class="time d-block">${new Date(d.comment_time*1000).toLocaleString()}</small>
                  </div>
                </div>
                `;
              }else{
                return `
                <div class="list-comment-commentator row no-gutters justify-content-end" id="${d.comment_time}">
                  <div class="col-10 col-lg-8 comment-other px-3">
                    <span class="d-block">${d.comment_text}</span>
                    <small class="fullname d-block">${d.fullname}</small>
                    <small class="time d-block">${new Date(d.comment_time*1000).toLocaleString()}</small>
                  </div>
                </div>
                `;
              }
            })()}
            `;
          });
          $('.box-comment-list-22').html(html);
        }
      }
    })
  }
  getCommentByReportId()
  setInterval(() => {
  getCommentByReportId()
  }, 1000);


  $('#form_comment').on('submit',function (e) {
    e.preventDefault();
    if($(this).find('.comment_write').val() ==''){
      alert('OK')
    }
    $.ajax({
      url : $('#form_comment').attr('action'),
      type : 'POST',
      data: $('#form_comment').serialize(),
      success: function (res) {
        $('#comment_write').val('');
        getCommentByReportId()
      }
    })
  })

</script>