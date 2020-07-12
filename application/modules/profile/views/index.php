<?=$this->session->flashdata('message');?>
<h3 class="text-center pt-3 text-secondary border-bottom pb-2 bg-white">My Profile</h3>
<div class="card-profile border-bottom pb-2 bg-white">
  <div class="profile-img">
    <img src="<?=base_url('assets/img/profile/').$profile->image; ?>" alt="<?=$profile->image; ?>">
  </div>
  <div class="profile-detail">
    <h3 class="fullname text-secondary text-uppercase"><?=$profile->fullname ?></h3>
    <div class="contact-profile">
      <span class="text-secondary d-block"><i class="fas fa-phone mr-2"></i> <?=$profile->phone ?></span>
      <span class="text-secondary d-block"><i class="fas fa-envelope mr-2"></i> <?=$profile->email ?></span>
      <span class="text-secondary d-block"><i class="fas fa-user-tie mr-2"></i> <?=$profile->position_name ?></span>
      <small>
        <?php for ($i=0; $i < $profile->indicator; $i++) : ?>
          <i class="fas fa-star text-warning"></i>
        <?php endfor; ?>
      </small>
    </div>
    <div class="info-act d-flex justify-content-between align-items-center pr-2 mt-3">
      <div class="act-group">
      <?php if($this->session->userdata('role_id') != 4) : ?>
      <a href="<?=base_url('announcement/create/'); ?>" class="btn-edit-profile btn btn-sm btn-danger">
        <i class="fas fa-bullhorn"></i> Pengumuman
      </a>
      <?php endif; ?>
      <a href="<?=base_url('profile/edit/'); ?>" class="btn-edit-profile btn btn-sm btn-primary">
        <i class="fas fa-user-edit"></i>
      </a>
      <a href="<?=base_url('profile/change_password/'); ?>" class="btn-edit-profile btn btn-sm border">
        <i class="fas fa-key"></i>
      </a>
      <button data-toggle="modal" data-target="#modal_logout" class="btn-edit-profile btn btn-sm border">
        <i class="fas fa-power-off"></i>
      </button>
      </div>
    </div>
  </div>
</div>

<div class="report-item-default row no-gutters">
  <?php if($this->session->userdata('role_id') != 1) : ?>
    <?php for($x = 0; $x < 4; $x++) : ?>
      <div class="col-6 p-2">
      <div class="card shadow zoomIn border-0">
        <div class="card-body bg-white">
          <div class="d-flex align-items-center justify-content-center">
            <img class="rounded-circle" width="100px" height="100px" src="<?=base_url()?>assets/loader/3.gif" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  <?php endif; ?>
  </div>
  <div class="text-center py-3">
    <button class="btn btn-sm btn-primary shadow" id="btnAllReport">Semua Laporan</button>
  </div>
</div>



<!-- Modal -->
<div class="modal pulse" id="modal_logout">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content" style="border: 2px solid #100;">
      <div class="modal-body">
        <span class="text-center d-block">Apakah anda akan logout ?</span>
      </div>
      <div class="d-flex justify-content-between px-3 py-2">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">TIDAK</button>
        <a href="<?=base_url('auth/logout/') ?>" type="button" class="btn btn-sm btn-primary px-4">YA</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function getreport_by_user_id() {
    $.ajax({
      url : '<?=base_url()?>profile/get_report_by_user_id',
      type:'GET',
      success:function(result){
        console.log(result);
        $('.report-item-default').html(result);
      }
    })
  }
  function get_all_report_by_user_id() {
    $.ajax({
      url : '<?=base_url()?>profile/get_all_report_by_user_id',
      type:'GET',
      success:function(result){
        console.log(result);
        $('.report-item-default').html(result);
      }
    })
  }

  $('#btnAllReport').on('click',function () {
    clearInterval(interval);
    get_all_report_by_user_id();
  })
  getreport_by_user_id()
  let interval = setInterval(() => {
    getreport_by_user_id()
  }, 1000);
</script>