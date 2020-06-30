<div class="row no-gutters p-2 py-3 border-bottom">
  <div class="col-2">
    <a href="<?=base_url('home') ?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
</div>

<div class="card mb-3 border-0 rounded-0">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?=base_url('assets/img/profile/').$emp_det->image; ?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?=$emp_det->fullname; ?></h5>
        <p class="card-text"><small class="text-muted"><?=$emp_det->email;?></small></p>
        <p class="card-text"><i class="fas fa-fw fa-mobile-alt"></i> <?=$emp_det->phone; ?></p>
        <p class="card-text"><i class="fas fa-fw fa-user-tie"></i> <?=$emp_det->position_name; ?></p>

        <?php if($this->session->userdata('role_id') != 3) : ?>
        <a href="#" class="btn btn-sm btn-primary rounded-0 shadow-sm">
          <i class="fas fa-file-signature"></i> Lihat Laporan
        </a>
        <a href="#" class="btn btn-sm btn-success rounded-0 shadow-sm">
          <i class="fas fa-comment"></i> Chat <?=$emp_det->fullname; ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>