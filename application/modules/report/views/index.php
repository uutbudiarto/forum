<div class="report-default-box">
  <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 55px)">
    <img width="100px" height="100px" src="<?=base_url()?>assets/loader/2.gif" alt="">
  </div>
</div>


<script type="text/javascript">
  function getReport() {
    $.ajax({
      url : '<?=base_url()?>report/get_report/',
      type : 'GET',
      success: function (result) {
        $('.report-default-box').html(result)
      }
    })
  }
  getReport()
  let interval = setInterval(() => {
    getReport()
  }, 1000);
  $('.report-default-box').on('click','.btnReadReport',function () {
    const reportId = $(this).data('id');
    window.location.href = '<?=base_url()?>report/detail_report/'+reportId
  })
</script>