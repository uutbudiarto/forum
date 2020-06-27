<?=$this->session->flashdata('message'); ?>
<div class="form-auth">
  <h1 class="brand-name-primary text-center">Rx Forum</h1>
  <h6 class="text-center text-secondary mb-3"><?=$title; ?></h6>
  <?= form_open('auth', 'id="form_auth"'); ?>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-envelope"></i></span>
      <input type="text" class='form-control input-auth <?php if (form_error('email')) {echo 'is-invalid';} ?>' id="email" name="email" value="<?=set_value('email');?>" placeholder="Email">
      <?= form_error('email','<div class="invalid-feedback text-right">','</div>'); ?>
      <?=$this->session->flashdata('email_err'); ?>
    </div>
    <div class="form-group form-group-auth px-2">
      <span class="icon-input-auth"><i class="fas fa-lock"></i></span>
      <input type="password" class="form-control input-auth <?php if (form_error('password')) {echo 'is-invalid';} ?>" id="password" name="password" value="<?=set_value('password');?>" placeholder="Password">
      <?= form_error('password','<div class="invalid-feedback text-right">','</div>'); ?>
      <?=$this->session->flashdata('pass_err'); ?>
      <a href="" class="forgot-password d-none"><i class="fas fa-key"></i> Lupa Password</a>
    </div>

    <div class="d-flex align-items-center justify-content-between">
      <div class="act-other-auth ml-lg-2 mt-3 d-none">
        <small class="d-block text-secondary">Belum punya akun ?</small>
        <small><a href="<?=base_url('auth/register/')?>" class="card-link">Daftar</a></small>
      </div>
      <button class="btn-sign">
        Masuk
        <i class="fas fa-arrow-right icon-btn-sign"></i>
      </button>
    </div>
    <?= form_close() ?>
</div>