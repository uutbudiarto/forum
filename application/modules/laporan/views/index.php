<div class="row no-gutters px-1 pt-2 pb-1 mb-3 border-bottom">
  <div class="col-md-5 mb-2">
    <button class="btn btn-sm btn-dark">Semua</button>
    <button class="btn btn-sm btn-dark takeCountUr">minggu ini</button>
    <button class="btn btn-sm btn-dark">belum dibaca</button>
  </div>
  <div class="col-md-7 mb-2">
  <?= form_open('report/filter',"id='form_report'"); ?>
    <div class="input-group input-group-sm">
      <input type="date" name="start_date" class="form-control">
      <input type="date" name="end_date" class="form-control">
      <div class="input-group-append">
        <button type="submit" class="btn btn-dark">Cari</button>
      </div>
    </div>
  </form>
  </div>
</div>
<input type="hidden" class="d-none" name="laporan_key" id="laporan_key" value="<?=$this->session->userdata('role_id'); ?>">
<div class="card rounded-0 mx-1 mb-2 card_list_laporan"></div>


<script type="text/javascript">
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
          <div class="row no-gutters">
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
                       return `<span class="indicator-owner text-danger">Belum dibaca</span>`;
                      }else{return ``;}
                    }else{
                      if(d.is_manager_readed == 0){
                        return `<span class="indicator-manager text-danger">Belum dibaca</span>`;
                      }else{return ``;}
                    }
                  })()}
                  </div>
                <!-- kondisi status read sementara -->
                <h5 class="card-title">${d.fullname}</h5>
                <p class="card-text">${d.report_text}</p>
                <p class="card-text"><small class="text-muted">${new Date(d.time_created*1000).toUTCString()}</small></p>
              </div>
              <div class="text-right p-2">
              ${(() =>{
                if(d.new_comment_unread > 0){
                  return `<small class="text-danger"> ${d.new_comment_unread} Belum dibaca</small>`
                }else{
                  return ``;
                }
              })()}
                <a href="javascript:void(0)" class="btn btn-dark rounded-0 btn-sm btnReadReport" data-id="${d.report_id}">
                  <i class="fas fa-comment-alt"></i>
                  <span class="badge badge-sucsess">${d.count_comment}</span>
                </a>
              </div>
              <div class="text-right pr-2">
                <a href="#" class="t12"><i class="fas fa-edit text-secondary"></i></a>
                <a href="#" class="t12"><i class="fas fa-trash-alt text-danger"></i></a>
              </div>
            </div>
          </div>
          <hr>
          `;
        });
        $('.card_list_laporan').html(html);
      }else{
        $('.card_list_laporan').html(`
          <p class="text-center text-danger">Laporan tidak diemukan</p>
        `);
      }
    }
  }) 
}
getr()
setInterval(() => {
  getr()
}, 1000);

$('body').on('click','.btnReadReport',function () {
  const idReport = $(this).data('id');
  window.location.href ='<?=base_url() ?>laporan/get_laporan_by_id/'+idReport
})
</script>