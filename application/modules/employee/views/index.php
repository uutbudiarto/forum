<div class="row no-gutters justify-content-between border-bottom p-2">
  <div class="col-md-6 col-6">
    <h5 class="text-secondary">List Karyawan</h5>
  </div>
  <div class="col-md-4 col-6">
    <select name="filter_emp" id="filter_emp" class="custom-select custom-select-sm form-control">
      <option value="">Semua</option>
      <?php foreach($employee as $emp) : ?>
        <?php if($emp->id != $this->session->userdata('user_id')) : ?>
        <option value="<?=$emp->id; ?>"><?=$emp->fullname; ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
  </div>
</div>


<div id="box-user">
  <?php foreach($employee as $emp) : ?>
    <div class="media">
      <img width="80" height="80" src="<?=base_url('assets/img/profile/').$emp->image;?>" class="m-2 rounded-circle">
      <div class="media-body">
        <h5 class="mt-0"><?=$emp->fullname; ?></h5>
        <span class="d-block"><?=$emp->phone; ?></span>
        <span class="d-block"><?=$emp->position_name; ?></span>
      </div>
    </div>
    <?php if($this->session->userdata('role_id') != 3) : ?>
      <?php if($this->session->userdata('email') != $emp->email) : ?>
      <div class="text-right m-2">
        <a href="<?=base_url('laporan/get_laporan_by_user_id/').$emp->id?>" class="btn btn-sm btn-success"><i class="fas fa-file-alt"></i> Laporan</a>
        <a href="<?=base_url('chat/index/'.$emp->id); ?>" class="btn btn-primary btn-sm"><i class="fas fa-comment-alt"></i> Chat</a>
      </div>
      <?php else : ?>
        <div class="text-right m-2">
          <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-comment-alt"></i> Chat</button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <hr>
  <?php endforeach; ?>
</div>


<script type="text/javascript">
  $('#filter_emp').on('change',function () {
    const userId = $('#filter_emp option:selected').val();
    $.ajax({
      url : '<?=base_url()?>employee/filter_user/'+userId,
      success: function (res) {
        let html = '';
        if(res){
          const data = JSON.parse(res);
          data.forEach(d => {
            html += `
            <div class="media">
              <img width="80" height="80" src="<?=base_url('assets/img/profile/')?>${d.image}" class="m-2 rounded-circle">
              <div class="media-body">
                <h5 class="mt-0">${d.fullname}</h5>
                <span class="d-block">${d.phone}</span>
                <span class="d-block">${d.position_name}</span>
              </div>
            </div>
            <?php if($this->session->userdata('role_id') != 3) : ?>
              <?php if($this->session->userdata('email') != $emp->email) : ?>
              <div class="text-right m-2">
              <a href="<?=base_url('laporan/get_laporan_by_user_id/')?>${d.id}" class="btn btn-sm btn-success"><i class="fas fa-file-alt"></i> Laporan</a>
                <a href="<?=base_url('chat/index/');?>${d.id}" class="btn btn-sm btn-primary"><i class="fas fa-comment-alt"></i> Chat</a>
              </div>
              <?php else : ?>
                <div class="text-right m-2">
                  <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-comment-alt"></i> Chat</button>
                </div>
              <?php endif; ?>
            <?php endif; ?>
            <hr>
          `;
          });
        $('#box-user').html(html);
        }else{
          window.location.replace('<?=base_url()?>employee');
        }
      }
    })
  })
</script>