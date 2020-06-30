<div class="box-all-users p-2">
  <?php foreach($all_users as $user) : ?>
    <?php if($user->id != $this->session->userdata('user_id')) : ?>
    <div class="box-user" onclick='detail_emp(<?=$user->id?>)'>
        <img src="<?=base_url('assets/img/profile/').$user->image; ?>" alt="">
        <span><?=$user->fullname; ?></span>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php foreach ($chat_root as $cr) : ?>
  <div class="chat-by p-2" onclick='load_replay_chat(<?=$cr->chat_root_id?>)'>
    <div class="row no-gutters align-items-center">
      <div class="col-3 col-md-2">
        <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$cr->image?>" alt="">
      </div>
      <div class="col-6 col-md-7">
        <p><?=$cr->from ?></p>
        <small><?=$cr->position_name ?></small>
      </div>
      <div class="col-3 col-md-3 text-center">
        <small class="text-danger">
          <?php if($cr->count_chat_adm > 0) : ?>
            <?=$cr->count_chat_adm; ?> pesan belum dibaca
          <?php endif; ?>
        </small>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<div class="row no-gutters justify-content-end">
  <div class="col-6 text-right mr-2">
    <div class="list-group list-group-flush mt-3">
      <?php if($get_chat_fa) : ?>
        <small><i class="fas fa-bell text-danger"></i></small>
        <?php foreach($get_chat_fa as $gcf) : ?>
      <a href="<?=base_url('chat/index/').$gcf->to_user;?>" class="list-group-item list-group-item-action p-1 d-flex justify-content-between align-items-center px-2 rounded-0">
        <small class="text-danger"><b><?=$gcf->count_chat_emp ?> balasan</b> dari <?=$gcf->replay_from_emp;?> belum dibaca</small>
      </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>


<pre>
  <?php if($get_chat_fa) : ?>
  <?php print_r($get_chat_fa) ?>
  <?php endif; ?>
</pre>

<!-- <div class="alert alert-danger bg-danger rounded-0 shadow mx-2 mt-3 alert-dismissible show" role="alert">
  <h3 class="text-center text-white"><i class="fas fa-bullhorn"></i> PENGUMUMAN</h3>
  <strong class="text-white">Penting!</strong>
  <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="text-an text-white">
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis libero reiciendis voluptatibus ipsa recusandae dolor quod saepe, itaque, nemo aliquid fugit maiores, voluptatum repudiandae quas? At incidunt omnis temporibus numquam.
  </div>
  <div class="text-white mt-5">
    <span>TTD</span>
    <p>JAKARTA, 20 FEB 2021</p>
    <span>Nama admin pembuat</span>
  </div>
</div> -->


<script type="text/javascript">

function detail_emp(user_id) {
  window.location.href = '<?=base_url('employee/detail/')?>'+user_id;
}

function load_replay_chat(chat_root_id){
  window.location.href = '<?=base_url('chat/load_reply_chat/')?>'+chat_root_id;
}


$('document').ready(function () {
  $('.box-all-users').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 5,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
})
</script>