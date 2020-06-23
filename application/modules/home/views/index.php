<div class="box-all-users p-2">
  <?php foreach($all_users as $user) : ?>
    <div class="box-user">
        <img src="<?=base_url('assets/img/profile/').$user->image; ?>" alt="">
        <span><?=$user->fullname; ?></span>
    </div>
  <?php endforeach; ?>
</div>

<div class="alert alert-danger bg-danger rounded-0 shadow mx-2 mt-3 alert-dismissible show" role="alert">
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
</div>


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