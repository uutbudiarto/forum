<div class="row no-gutters border-bottom p-2">
  <div class="col-12 text-center">
    <h5 class="text-secondary">List Karyawan</h5>
  </div>
</div>

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
      <a href="<?=base_url('chat/index/'.$emp->id); ?>" class="btn btn-primary rounded-0"><i class="fas fa-comment-alt"></i> Chat</a>
    </div>
    <?php else : ?>
      <div class="text-right m-2">
        <button class="btn btn-secondary rounded-0" disabled><i class="fas fa-comment-alt"></i> Chat</button>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <hr>
<?php endforeach; ?>