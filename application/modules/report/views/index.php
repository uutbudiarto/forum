<?=$this->session->flashdata('message'); ?>
<div class="row no-gutters px-1 pt-2 pb-1 mb-3 border-bottom">
  <div class="col-md-5 mb-2">
    <button class="btn btn-sm btn-dark">Semua</button>
    <button class="btn btn-sm btn-dark">minggu ini</button>
    <button class="btn btn-sm btn-dark">belum dibaca</button>
  </div>
  <div class="col-md-7 mb-2">
  <?= form_open('report/filter',"id='form_report'"); ?>
    <div class="input-group input-group-sm">
      <input type="date" name="start_date" class="form-control">
      <input type="date" name="end_date" class="form-control">
      <div class="input-group-append">
        <button type="submit" class="btn btn-dark">Cari</button>
      </div>
    </div>
  </form>
  </div>
</div>

<?php if($reports) : ?>
  <?php foreach($reports as $r) : ?>
    <div class="card rounded-0 mx-1 mb-2 zoomIn">
      <div class="row no-gutters">
        <div class="col-md-2 col-2">
          <img src="<?=base_url('assets/img/profile/').$r->user_image; ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-10 col-10">
          <div class="card-body">
            <!-- kondisi status read sementara -->
            <?php if($this->session->userdata('role_id') != 3) : ?>
              <div class="indicator-read">
                <?php if($this->session->userdata('role_id') == 1) : ?>
                  <?php if($r->is_owner_readed == 0) : ?>
                    <span class="indicator-owner text-danger">Belum dibaca</span>
                  <?php endif; ?>
                <?php else: ?>
                  <?php if($r->is_manager_readed == 0) : ?>
                    <span class="indicator-manager text-danger">Belum dibaca</span>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <!-- kondisi status read sementara -->
            <h5 class="card-title"><?=$r->fullname; ?></h5>
            <p class="card-text"><?=$r->report_text; ?></p>
            <p class="card-text"><small class="text-muted"><?=date('D , d F Y',$r->time_created); ?></small></p>
          </div>
          <div class="text-right p-2">

          <!-- kondisi komen -->
          <?php if($this->session->userdata('role_id') == 1) : ?>
            <?php if($r->count_comment_owner > 0) : ?>
              <small class="text-danger"><?=$r->count_comment_owner; ?> Pesan belum dibaca</small>
            <?php endif; ?>
          <?php elseif($this->session->userdata('role_id') == 2) : ?>
            <?php if($r->count_comment_manager > 0) : ?>
              <small class="text-danger"><?=$r->count_comment_manager; ?> Pesan belum dibaca</small>
            <?php endif; ?>
          <?php else : ?> 
            <?php if($r->count_comment_user > 0) : ?>
              <small class="text-danger"><?=$r->count_comment_user; ?> Pesan belum dibaca</small>
            <?php endif; ?>
          <?php endif; ?>
          <!-- kondisi komen sementara -->

            <a href="<?=base_url('report/read/').$r->report_id; ?>" class="btn btn-dark rounded-0 btn-sm">
              <i class="fas fa-comment-alt"></i>
              <span class="badge badge-sucsess"><?=$r->count_comment; ?></span>
            </a>
          </div>
        </div>
      </div>
      <?php if($r->user_id == $this->session->userdata('user_id')) : ?>
      <div class="text-right">
        <div class="btn-group dropup">
          <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
          </button>
          <div class="dropdown-menu border-0 shadow" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-secondary" href="#"><i class="fas fa-trash-alt"></i> Hapus</a>
            <a class="dropdown-item text-secondary" href="#"><i class="fas fa-pencil-alt"></i> Ubah</a>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="mt-5 pt-5 tada">
    <h1 class="text-danger text-center"><i class="fas fa-file-contract fa-2x"></i></h1>
    <h6 class="text-danger text-center">Laporan tidak ditemukan</h6>
  </div>
<?php endif; ?>

<pre>
  <?php print_r($reports); ?>
</pre>