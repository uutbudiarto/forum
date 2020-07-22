<div class="row no-gutters justify-content-between shadow mb-4 p-2">
  <div class="col-6 col-md-5">
    <input type="text" id="keyword" class="form-control form-control-sm" placeholder="cari laporan..">
  </div>
  <div class="col-5 col-md-5 input-group-sm">
    <select id="emp_id" class="custom-select form-control">
      <option value="">Semua Karyawan</option>
      <?php foreach($emp as $e) : ?>
        <option value="<?=$e->id ?>">Laporan - <?=$e->fullname; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="w-100 mt-2"><small>Filter Tanggal</small></div>
  <div class="col-5">
    <input type="date" name="start_date" id="start_date" class="form-control form-control-sm" value="<?=date('Y-m-d');?>">
  </div>
  <div class="col-2 col-md-1 text-center"><small>s/d</small></div>
  <div class="col-5">
    <input type="date" name="end_date" id="end_date" class="form-control form-control-sm" value="<?=date('Y-m-d');?>">
  </div>
</div>

<div class="report-default-box">
  <div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 55px)">
    <img width="100px" height="100px" src="<?=base_url()?>assets/loader/2.gif" alt="">
  </div>
</div>


<script type="text/javascript">

  $('#keyword').on('keyup',function () {
    let keyword = $(this).val();
    $.ajax({
      url:'<?=base_url()?>report/search_report/',
      type: 'POST',
      data: {
        'keyword' : keyword
      },
      success: function (result) {
        clearInterval(interval);
        $('.report-default-box').html(result)
      }
    })
  })

  $('#emp_id').on('change',function () {
    let empId = $('#emp_id option:selected').val();
    $.ajax({
      url:'<?=base_url()?>report/filter_report_by_user/'+empId,
      success: function (result) {
        clearInterval(interval);
        $('.report-default-box').html(result)
      }
    })
  })

  $('#end_date').on('change',function () {
  let srartDate = $('#start_date').val();
  let endDate = $('#end_date').val();
  $.ajax({
    url: '<?=base_url()?>report/get_report_by_date/',
    type: 'POST',
    data:{
      'start_date' : srartDate,
      'end_date' : endDate,
    },
    success: function (result) {
      clearInterval(interval);
      $('.report-default-box').html(result)
    }
  })
})



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