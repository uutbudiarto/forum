<!-- <div class="row no-gutters px-1 pt-2 pb-1 mb-3 border-bottom">
  <div class="col-md-5">
    <button class="btn btn-sm btn-dark">Semua</button>
    <button class="btn btn-sm btn-dark takeCountUr">minggu ini</button>
    <button class="btn btn-sm btn-dark">belum dibaca</button>
  </div>
  <div class="col-md-7 mb-2">
    <?= form_open('report/filter',"id='form_report'"); ?>
      <div class="row">
        <div class="col">
          <label for="start_date">Dari</label>
          <input type="date" class="form-control form-control-sm" name="start_date" id="start_date">
        </div>
        <div class="col">
          <label for="end_date">Sampai</label>
          <input type="date" class="form-control form-control-sm" name="end_date" id="end_date">
        </div>
      </div>
      <div class="text-right mt-2">
        <button class="btn btn-sm btn-primary">Filter</button>
      </div>
    <?= form_close(); ?>
  </div>
</div> -->
<div class="row no-gutters justify-content-between shadow mb-4 p-2">
  <div class="col-6 col-md-5">
    <input type="text" id="keyword" class="form-control form-control-sm" placeholder="cari laporan..">
  </div>
  <div class="col-5 col-md-5 input-group-sm">
    <select name="r_emp" id="e_emp" class="custom-select form-control">
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
  <div class="col-4"></div>
</div>
<input type="hidden" class="d-none" name="laporan_key" id="laporan_key" value="<?=$this->session->userdata('role_id'); ?>">
<div class="card rounded-0 mx-1 my-2 card_list_laporan"></div>


<script type="text/javascript">

$('#end_date').on('change',function () {
  let srartDate = $('#start_date').val();
  let endDate = $('#end_date').val();
  $.ajax({
    url: '<?=base_url()?>laporan/get_laporan_by_date/',
    type: 'POST',
    data:{
      'start_date' : srartDate,
      'end_date' : endDate,
    },
    success:function(res){
      clearInterval(myInterVal);
      if (res) {
        let laporan_key = $('#laporan_key').val();
        let html ='';
        const data = JSON.parse(res);
        data.forEach(d => {
          if (d.new_comment_unread > 0) {
            let comment_unread = d.new_comment_unread;
          }
          html += `
          <div class="row no-gutters border-top">
            <div class="col-md-2 col-2">
              <img src="<?=base_url('assets/img/profile/')?>${d.user_image}" class="card-img" alt="...">
            </div>
            <div class="col-md-10 col-10">
              <div class="card-body">
                <!-- kondisi status read sementara -->
                  <div class="indicator-read">
                  ${(()=>{
                    if(laporan_key == 1){
                      if(d.is_owner_readed == 0){
                       return `<span class="indicator-owner text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }else{
                      if(d.is_manager_readed == 0){
                        return `<span class="indicator-manager text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }
                  })()}
                  </div>
                <!-- kondisi status read sementara -->
                <h5 class="card-title">${d.fullname}</h5>
                <p class="card-text">${d.report_text.slice(0,30)}...</p>
                <p class="card-text"><small class="text-muted">${new Date(d.time_created*1000).toUTCString()}</small></p>
              </div>
              <div class="text-right p-2">
              ${(() =>{
                if(d.new_comment_unread > 0){
                  return `<small class="text-danger"> ${d.new_comment_unread} balasan belum dibaca</small>`
                }else{
                  return ``;
                }
              })()}
                <a href="javascript:void(0)" class="btn btn-primary rounded btn-sm btnReadReport" data-id="${d.report_id}">
                  <i class="fas fa-comment"></i>
                  <span class="badge badge-sucsess">${d.count_comment}</span>
                </a>
              </div>
            </div>
          </div>
          `;
        });
        $('.card_list_laporan').html(html);
      }else{
        $('.card_list_laporan').html(`
        <div class="mt-5 pt-5">
          <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
          <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
        </div>
        `);
      }
    }
  })
})

$('#keyword').on('keyup',function () {
  clearInterval(myInterVal);
  let keyword = $(this).val();
  $.ajax({
    url: '<?=base_url()?>laporan/search_laporan/'+keyword,
    type:'GET',
    success: function (res) {
      if (res) {
        let laporan_key = $('#laporan_key').val();
        let html ='';
        const data = JSON.parse(res);
        data.forEach(d => {
          if (d.new_comment_unread > 0) {
            let comment_unread = d.new_comment_unread;
          }
          html += `
          <div class="row no-gutters border-top">
            <div class="col-md-2 col-2">
              <img src="<?=base_url('assets/img/profile/')?>${d.user_image}" class="card-img" alt="...">
            </div>
            <div class="col-md-10 col-10">
              <div class="card-body">
                <!-- kondisi status read sementara -->
                  <div class="indicator-read">
                  ${(()=>{
                    if(laporan_key == 1){
                      if(d.is_owner_readed == 0){
                       return `<span class="indicator-owner text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }else{
                      if(d.is_manager_readed == 0){
                        return `<span class="indicator-manager text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }
                  })()}
                  </div>
                <!-- kondisi status read sementara -->
                <h5 class="card-title">${d.fullname}</h5>
                <p class="card-text">${d.report_text.slice(0,30)}...</p>
                <p class="card-text"><small class="text-muted">${new Date(d.time_created*1000).toUTCString()}</small></p>
              </div>
              <div class="text-right p-2">
              ${(() =>{
                if(d.new_comment_unread > 0){
                  return `<small class="text-danger"> ${d.new_comment_unread} balasan belum dibaca</small>`
                }else{
                  return ``;
                }
              })()}
                <a href="javascript:void(0)" class="btn btn-primary rounded btn-sm btnReadReport" data-id="${d.report_id}">
                  <i class="fas fa-comment"></i>
                  <span class="badge badge-sucsess">${d.count_comment}</span>
                </a>
              </div>
            </div>
          </div>
          `;
        });
        $('.card_list_laporan').html(html);
      }else{
        $('.card_list_laporan').html(`
        <div class="mt-5 pt-5">
          <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
          <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
        </div>
        `);
      }
    }
  })  
})

$('#e_emp').on('change',function () {
  const empId = $('#e_emp option:selected').val();
  $.ajax({
    url: '<?=base_url()?>laporan/laporan_by_emp/'+empId,
    type: 'GET',
    success: function(res){
      clearInterval(myInterVal);
      if (res) {
        let laporan_key = $('#laporan_key').val();
        let html ='';
        const data = JSON.parse(res);
        data.forEach(d => {
          if (d.new_comment_unread > 0) {
            let comment_unread = d.new_comment_unread;
          }
          html += `
          <div class="row no-gutters border-top">
            <div class="col-md-2 col-2">
              <img src="<?=base_url('assets/img/profile/')?>${d.user_image}" class="card-img" alt="...">
            </div>
            <div class="col-md-10 col-10">
              <div class="card-body">
                <!-- kondisi status read sementara -->
                  <div class="indicator-read">
                  ${(()=>{
                    if(laporan_key == 1){
                      if(d.is_owner_readed == 0){
                       return `<span class="indicator-owner text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }else{
                      if(d.is_manager_readed == 0){
                        return `<span class="indicator-manager text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }
                  })()}
                  </div>
                <!-- kondisi status read sementara -->
                <h5 class="card-title">${d.fullname}</h5>
                <p class="card-text">${d.report_text.slice(0,30)}...</p>
                <p class="card-text"><small class="text-muted">${new Date(d.time_created*1000).toUTCString()}</small></p>
              </div>
              <div class="text-right p-2">
              ${(() =>{
                if(d.new_comment_unread > 0){
                  return `<small class="text-danger"> ${d.new_comment_unread} balasan belum dibaca</small>`
                }else{
                  return ``;
                }
              })()}
                <a href="javascript:void(0)" class="btn btn-primary rounded btn-sm btnReadReport" data-id="${d.report_id}">
                  <i class="fas fa-comment"></i>
                  <span class="badge badge-sucsess">${d.count_comment}</span>
                </a>
              </div>
            </div>
          </div>
          `;
        });
        $('.card_list_laporan').html(html);
      }else{
        $('.card_list_laporan').html(`
        <div class="mt-5 pt-5">
          <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
          <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
        </div>
        `);
      }
    }
  })
})


function getr() {
  $.ajax({
    'url': '<?=base_url()?>laporan/get_laporan/',
    'success':function (res) {
      if (res) {
        let laporan_key = $('#laporan_key').val();
        let html ='';
        const data = JSON.parse(res);
        data.forEach(d => {
          if (d.new_comment_unread > 0) {
            let comment_unread = d.new_comment_unread;
          }
          html += `
          <div class="row no-gutters border-top">
            <div class="col-md-2 col-2">
              <img src="<?=base_url('assets/img/profile/')?>${d.user_image}" class="card-img" alt="...">
            </div>
            <div class="col-md-10 col-10">
              <div class="card-body">
                <!-- kondisi status read sementara -->
                  <div class="indicator-read">
                  ${(()=>{
                    if(laporan_key == 1){
                      if(d.is_owner_readed == 0){
                       return `<span class="indicator-owner text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }else{
                      if(d.is_manager_readed == 0){
                        return `<span class="indicator-manager text-danger">Laporan belum dibaca</span>`;
                      }else{return ``;}
                    }
                  })()}
                  </div>
                <!-- kondisi status read sementara -->
                <h5 class="card-title">${d.fullname}</h5>
                <p class="card-text">${d.report_text.slice(0,30)}...</p>
                <p class="card-text"><small class="text-muted">${new Date(d.time_created*1000).toUTCString()}</small></p>
              </div>
              <div class="text-right p-2">
              ${(() =>{
                if(d.new_comment_unread > 0){
                  return `<small class="text-danger"> ${d.new_comment_unread} balasan belum dibaca</small>`
                }else{
                  return ``;
                }
              })()}
                <a href="javascript:void(0)" class="btn btn-primary rounded btn-sm btnReadReport" data-id="${d.report_id}">
                  <i class="fas fa-comment"></i>
                  <span class="badge badge-sucsess">${d.count_comment}</span>
                </a>
              </div>
            </div>
          </div>
          `;
        });
        $('.card_list_laporan').html(html);
      }else{
        $('.card_list_laporan').html(`
        <div class="mt-5 pt-5">
          <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
          <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
        </div>
        `);
      }
    }
  }) 
}

getr()
let myInterVal = setInterval(() => {
  getr()
}, 1000);


$('body').on('click','.btnReadReport',function () {
  const idReport = $(this).data('id');
  window.location.href ='<?=base_url() ?>laporan/get_laporan_by_id/'+idReport
})
</script>