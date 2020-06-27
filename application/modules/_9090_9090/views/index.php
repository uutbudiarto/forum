<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register</title>
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/main.css'); ?>">
</head>
<body>

<div class="container">
  <?= $this->session->flashdata('message'); ?>
  <div class="row justify-content-center mt-5 pt-5">
    <div class="col-lg-6 bg-white">
      <h5 class="text-center text-secondary border-bottom py-3">Form Pendaftaran</h5>
      <?=form_open('_9090_9090'); ?>
        <div class="form-group row mt-3">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="text" class="form-control <?php if(form_error('email')){echo 'is-invalid';} ?>" id="email" name="email" value="<?=set_value('email'); ?>" autocomplete="off">
            <?=form_error('email','<div class="invalid-feedback">','</div>');?>
          </div>
        </div>
        <div class="form-group row">
          <label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" class="form-control <?php if(form_error('fullname')){echo 'is-invalid';} ?>" name="fullname" id="fullname" value="<?=set_value('fullname'); ?>" autocomplete="off">
            <?=form_error('fullname','<div class="invalid-feedback">','</div>');?>
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-3 col-form-label">Telepon</label>
          <div class="col-sm-9">
            <input type="text" class="form-control <?php if(form_error('phone')){echo 'is-invalid';} ?>" id="phone" name="phone" value="<?=set_value('phone'); ?>" autocomplete="off">
            <?=form_error('phone','<div class="invalid-feedback">','</div>');?>
          </div>
        </div>
        <div class="form-group row">
          <label for="position" class="col-sm-3 col-form-label">Posisi</label>
          <div class="col-sm-9">
          <select class="custom-select form-control <?php if(form_error('position')){echo 'is-invalid';} ?>" name="position">
            <option value="">Pilih Posisi</option>
            <?php foreach($position as $p) : ?>
              <option value="<?=$p->id; ?>"><?=$p->position_name; ?></option>
            <?php endforeach; ?>
          </select>
          <?=form_error('position','<div class="invalid-feedback">','</div>');?>
          </div>
        </div>
        <div class="text-right py-3">
          <button class="btn btn-primary">Daftarkan</button>
        </div>
      <?=form_close();?>
    </div>
  </div>
</div>
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>  
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>  
</body>
</html>