<div class="back-top row no-gutters p-3 border-bottom">
  <div class="col-1">
    <a href="<?=base_url('report/'); ?>" class="card-link text-dark"><i class="fas fa-arrow-left"></i></a>
  </div>
  <div class="text-center col-10 d-flex align-items-center">
  <img width="35" height="35" class="img-user-comment mr-2" src="<?=base_url('assets/img/profile/').$report->user_image; ?>" alt="">
    <h6 class="text-secondary">Laporan Dari : <?=$report->fullname ?></h6>
  </div>
</div>



<div class="card border-0 my-2">
  <div class="row no-gutters">
    <div class="col-md-12 col-12">
      <div class="card-body">
        <p class="card-text">
          <?=$report->report_text; ?>
        </p>
        <small class="d-block text-secondary text-right"><?=date('D- d m Y',$report->time_created);?></small>
      </div>
    </div>
  </div>
  <div class="text-right border-bottomm pb-2 px-2">
    <button class="btn btn-sm btn-light"><i class="fas fa-image text-dark"></i></button>
    <button class="btn btn-sm btn-light"><i class="fas fa-paperclip text-dark"></i></button>
  </div>
</div>

<div class="box-list-comment row no-gutters mt-2 p-2">
  <?php foreach($comment as $cmt) : ?>
  <?php if ($cmt->user_id == $this->session->userdata('user_id')) : ?>
  <div class="col-8 mb-3">
    <div class="text-comment-list left">
      <span class="d-block t16-dark"><?=$cmt->comment_text; ?></span>
    </div>
    <small class="t10-grey"><?=date('d m Y',$cmt->comment_time);  ?></small>
    <small class="t10-grey">Jam : <?=date('H : i :s',$cmt->comment_time);  ?></small>
  </div>
  <div class="w-100"></div>
  <?php else : ?>
    <div class="col-3 col-lg-5"></div>
    <div class="col-9 col-lg-7 text-right mb-3">
    <div class="text-comment-list right">
      <small class="t10-b-grey"><b><?=$cmt->fullname; ?></b></small>
      <span class="d-block t16-dark text-left"><?=$cmt->comment_text; ?></span>
    </div>
    <small class="t10-grey"><?=date('d m Y',$cmt->comment_time);  ?></small>
    <small class="t10-grey">Jam : <?=date('H : i :s',$cmt->comment_time);  ?></small>
  </div>
  <div class="w-100"></div>
  <?php endif; ?>
  <?php endforeach; ?>
</div>
<?= form_open('report/create_comment'); ?>
  <div class="box-comment-input bg-white row no-gutters border-top align-items-center">
    <input type="hidden" name="report_id" value="<?=$report->report_id; ?>">
    <!-- <div class="col-2">
      <img class="img-user-comment" src="<?=base_url('assets/img/profile/').$this->session->userdata('image_user_login'); ?>" alt="">
    </div> -->
    <div class="col-10 border-bottom">
      <textarea name="comment_text" id="comment_text" class="form-control border-0" rows="3" placeholder="Komentar..."></textarea>
    </div>
    <div class="col-2 text-right p-2">
      <button class="btn btn-primary rounded-0 btn-sm">Kirim <i class="fas fa-paper-plane"></i></button>
    </div>
  </div>
<?= form_close(); ?>


