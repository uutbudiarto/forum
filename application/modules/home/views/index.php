<div class="box-all-users p-2">
  <?php foreach($all_users as $user) : ?>
    <div class="box-user">
        <img src="<?=base_url('assets/img/profile/').$user->image; ?>" alt="">
        <span><?=$user->fullname; ?></span>
    </div>
  <?php endforeach; ?>
</div>

<?php foreach ($chat_root as $cr) : ?>

<div class="chat-by p-2">
  <div class="row no-gutters align-items-center">
    <div class="col-3 col-md-2">
      <img width="50" height="50" class="rounded-circle" src="<?=base_url('assets/img/profile/').$cr->image?>" alt="">
    </div>
    <div class="col-6 col-md-8">
      <p><?=$cr->from ?></p>
      <small><?=$cr->position_name ?></small>
    </div>
    <div class="col-3 col-md-2 text-center">
      <a href="<?=base_url('chat/load_reply_chat/').$cr->chat_root_id; ?>" class="btn btn-primary rounded-0">
        <i class="fas fa-comment-alt"></i>
      </a>
    </div>
  </div>
</div><hr>
<?php endforeach; ?>

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