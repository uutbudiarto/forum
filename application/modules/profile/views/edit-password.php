<?=$this->session->flashdata('message'); ?>
<div class="row no-gutters border-bottom mb-3 px-2 pt-3 pb-2">
  <div class="col-2">
    <a href="<?=base_url('profile')?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="col-8 text-center">
    <h5 class="text-secondary">Update Password</h5>
  </div>
</div>
<div class="px-lg-5 mx-lg-5 p-2">
  <?= form_open('profile/change_password'); ?>
    <div class="form-group">
      <label for="current-pass">Password saat ini</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-lock"></i></span>
        </div>
        <input type="password" class="form-control <?php if(form_error('current-pass')){echo 'is-invalid';} ?>" placeholder="Masukan Password Saat Ini" name="current-pass" id="current-pass" value="<?= set_value('current-pass') ?>">
        <?= form_error('current-pass','<div class="invalid-feedback text-right">','</div>'); ?>
      </div>      
    </div>
    <h6 class="text-center my-4 text-secondary">Buat Password Baru</h6>
    <div class="form-group">
      <label for="new-pass">Password Baru</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-lock"></i></span>
        </div>
        <input type="password" class="form-control <?php if(form_error('new-pass')){echo 'is-invalid';} ?>" placeholder="Password Baru" name="new-pass" id="new-pass" value="<?= set_value('new-pass') ?>">
        <?= form_error('new-pass','<div class="invalid-feedback text-right">','</div>'); ?>
      </div>      
    </div>
    <div class="form-group">
      <label for="conf-pass">Ulangi Password</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-retweet"></i></span>
        </div>
        <input type="password" class="form-control <?php if(form_error('conf-pass')){echo 'is-invalid';} ?>" placeholder="Ulangi Password" name="conf-pass" id="conf-pass" value="<?= set_value('conf-pass') ?>">
        <?= form_error('conf-pass','<div class="invalid-feedback text-right">','</div>'); ?>      
      </div>
    </div>
    <div class="text-right">
      <a href="<?=base_url('profile'); ?>" class="btn btn-secondary">Batal</a>
      <button class="btn btn-primary">Ubah</button>
    </div>
  </form>
</div>