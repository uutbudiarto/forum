<ul class="list-unstyled">
  <?php foreach($lap_emp as $le) : ?>
  <li class="media p-2 border-bottom">
    <img width="50" height="50" src="<?=base_url('assets/img/profile/').$le->user_image;?>" class="mr-3 rounded-circle">
    <div class="media-body">
      <h5 class="mt-0 mb-1"><?=$le->fullname; ?></h5>
      <?php $lap = substr($le->report_text,0,50); ?>
      <span class="d-block"><?=$lap. '...' ?></span>
      <small class="text-secondary"><?=date('d-m-Y',$le->time_created); ?></small>
    </div>
    <a href="<?=base_url('laporan/get_laporan_by_id/').$le->report_id ?>" class="btn btn-sm btn-primary">Detail</a>
  </li>
  <?php endforeach; ?>
</ul>