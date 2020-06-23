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
      <?php if($this->session->userdata('role_id') == 3) : ?>
        <span class="badge badge-success rounded-0"><?=$countreport; ?> Laporan</span>
      <?php endif; ?>
      <div class="act-group">
      <?php if($this->session->userdata('role_id') != 3) : ?>
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

<div class="report-box">
  <?php foreach($myreport as $mr) : ?>
    <div class="card-report">
      <div class="card-report-body">
        <img src="<?=base_url('assets/img/report/').$mr->report_image; ?>" alt="">
        <h5 class="text-my-report"><?=date('l d m Y',$mr->time_created) ?></h5>
      </div>
      <div class="card-report-layer"></div>
      <div class="card-act-layer d-none">
        <a href="<?=base_url('report/read/').$mr->report_id; ?>" class="text-white card-link">
          <i class="fas fa-comment-alt"></i> <?=$mr->count_comment; ?>
        </a>
        <a href="<?=base_url('report/read/').$mr->report_id; ?>" class="text-white card-link">
          <i class="fas fa-fw fa-info-circle"></i> Detail
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<pre>
  <?php //print_r($_SESSION) ?>
</pre>

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
  $('.card-report').on('mouseenter',function(){
    $(this).find('.card-report-layer').addClass('show');
    $(this).find('.card-act-layer').removeClass('d-none');
  })
  $('.card-report').on('mouseleave',function(){
    $(this).find('.card-report-layer').removeClass('show');
    $(this).find('.card-act-layer').addClass('d-none');
  })
</script>