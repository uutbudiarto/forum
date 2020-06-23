<div class="form-auth">
  <h1 class="brand-name-primary text-center">Rx Forum</h1>
  <h6 class="text-center text-secondary mb-3"><?=$title; ?></h6>
  <?= form_open('auth/register', 'id="form_auth"'); ?>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-envelope"></i></span>
      <input type="text" class='form-control input-auth <?php if (form_error('email')) {echo 'is-invalid';} ?>' id="email" name="email" value="<?=set_value('email');?>" placeholder="Email" autocomplete="off">
      <?= form_error('email','<div class="invalid-feedback text-right">','</div>'); ?>
    </div>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-user"></i></span>
      <input type="text" class="form-control input-auth <?php if (form_error('fullname')) {echo 'is-invalid';} ?>" id="fullname" name="fullname" value="<?=set_value('fullname');?>" placeholder="Nama Lengkap" autocomplete="off">
      <?= form_error('fullname','<div class="invalid-feedback text-right">','</div>'); ?>
    </div>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-phone"></i></span>
      <input type="text" class="form-control input-auth <?php if (form_error('phone')) {echo 'is-invalid';} ?>" id="phone" name="phone" value="<?=set_value('phone');?>" placeholder="* 0896 xxxx xxxx" autocomplete="off">
      <?= form_error('phone','<div class="invalid-feedback text-right">','</div>'); ?>
    </div>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-lock"></i></span>
      <input type="password" class="form-control input-auth <?php if (form_error('password1')) {echo 'is-invalid';} ?>" id="password1" name="password1" value="<?=set_value('password1');?>" placeholder="Password">
      <?= form_error('password1','<div class="invalid-feedback text-right">','</div>'); ?>
    </div>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-retweet"></i></span>
      <input type="password" class="form-control input-auth <?php if (form_error('password2')) {echo 'is-invalid';} ?>" id="password2" name="password2" value="<?=set_value('password2');?>" placeholder="Ulangi Password">
      <?= form_error('password2','<div class="invalid-feedback text-right">','</div>'); ?>
    </div>

    <div class="d-flex align-items-center justify-content-between">
      <div class="act-other-auth ml-lg-2 mt-3">
        <small class="d-block text-secondary">Sudah punya akun ?</small>
        <small><a href="<?=base_url('auth')?>" class="card-link">Login</a></small>
      </div>
      <button class="btn-sign">
        Daftar
        <i class="fas fa-arrow-right icon-btn-sign"></i>
      </button>
    </div>
  <?= form_close() ?>
</div>