<div class="row no-gutters px-2 pt-3 pb-2 mb-3 border-bottom">
  <div class="col-2">
    <a href="<?=base_url('profile');?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="col-8 text-center">
    <h5 class="text-secondary">Edit Profile</h5>
  </div>
</div>

<?= form_open_multipart('profile/edit');?>
  <div class="text-center px-lg-5 p-2">
    <label for="image">
      <img src="<?=base_url('assets/img/profile/').$profile->image; ?>" id="label-image" class="label-image">
    </label>
    <input type="file" id="image" name="image" class="d-none">
    <span class="d-block file-name">pilih foto png | jpg | gif</span>
    <?= form_error('image','<div class="invalid-feedback text-center">','</div>'); ?>
    </div>
    <div class="px-lg-5 mx-lg-5 p-2">
    <div class="form-group">
      <label for="fullname">Nama Lengkap</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-user text-secondary"></i></span>
        </div>
        <input type="text" class="form-control <?php if(form_error('fullname')){echo 'is-invalid';} ?>" name="fullname" id="fullname" value="<?=$profile->fullname; ?>">
        <?= form_error('fullname','<div class="invalid-feedback text-right">','</div>'); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="phone">Handphone</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-phone text-secondary"></i></span>
        </div>
        <input type="text" class="form-control <?php if(form_error('phone')){echo 'is-invalid';} ?>" name="phone" id="phone" value="<?=$profile->phone; ?>">
        <?= form_error('phone','<div class="invalid-feedback text-right">','</div>'); ?>
      </div>
    </div>
    <!-- <div class="form-group">
      <label for="position">Posisi</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white"><i class="fas fa-fw fa-user-tie text-secondary"></i></span>
        </div>
          <select class="custom-select form-control">
            <option value="">Pilih Posisi</option>
              <?php foreach($position as $p) : ?>
                <?php if($p->id != 1) : ?>
                  <option value="<?=$p->id; ?>"><?=$p->position_name; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
          </select>
      </div>
    </div> -->
    <div class="form-group text-right">
      <a href="<?=base_url('profile');?>" class="btn btn-sm btn-secondary">Batal</a>
      <button class="btn btn-sm btn-primary">Simpan</button>
    </div>
  </div>
<?= form_close(); ?>

<script>
  $('#image').on('change',function (e) {
    let img = URL.createObjectURL(e.target.files[0])
		$(this).next().text(e.target.files[0].name);
		$(this).prev().find('#label-image').attr('src',img);
    
  })
</script>