<footer class="footer">
	<div class="container py-5">
		<div class="top-footer">
			<div class="row justify-content-between">
				<div class="col-lg-4 text-center text-lg-left mb-5 mb-lg-2 left">
					<img width="150" src="<?=base_url('assets/img/logo/logo-footer.png')?>" alt="">
					<h6 class="text-white my-3">E Commerce Rimer Shop</h6>
					<form>
						<div class="row">
							<div class="col-8 pr-0">
								<input type="text" class="form-control rounded-0" placeholder="example@email.com">
							</div>
							<div class="col-4 p-0">
								<button class="btn btn-r-primary rounded-0">Subcribe</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-3 text-center text-lg-left mb-5 mb-lg-2">
					<h6 class="text-white">CONTACT INFO</h6>
					<span class="text-muted">Alamat</span>
					<p class="font-weight-lighter">Jln TSS RAYA Duri Selatan, Tambora, Jakarta Barat</p>
					<span class="text-muted">Telepon</span>
					<p>+6212342342</p>
					<span class="text-muted">Email</span>
					<p>admin@rx-fashion.id</p>
				</div>
				<div class="col-lg-3 text-center text-lg-left mb-5 mb-lg-2">
					<h6 class="text-white">ACCOUNT</h6>
					<a class="text-decoration-none text-white" href=""><span class="my-2 d-block">Login</span></a>
					<a class="text-decoration-none text-white" href=""><span class="my-2 d-block">Order History</span></a>
					<a class="text-decoration-none text-white" href=""><span class="my-2 d-block">My Wishlist</span></a>
					<a class="text-decoration-none text-white" href=""><span class="my-2 d-block">Track Order</span></a>
					<h6 class="text-white mt-3">BE A SELLER</h6>
					<a href="" class="btn btn-danger text-white rounded-0">Apply Now</a>
				</div>
				<div class="col-lg-2 text-center text-lg-left mb-lg-2">
					<h6 class="text-white">DAPATKAN APLIKASI</h6>
					<img class="img-fluid my-2 rimer-app" src="<?=base_url('assets/img/rimer-icons/playstore.png');?>" alt="">
					<img class="img-fluid my-2 rimer-app" src="<?=base_url('assets/img/rimer-icons/appstore.png');?>" alt="">
				</div>
			</div>
		</div>		
	</div>
	<div class="bottom-footer p-3">
		<p class="text-center">IKUTI KAMI DI </p>
		<div class="social text-center">
			<span class="mx-2"><i class="fab fa-facebook fa-2x"></i></span>
			<span class="mx-2"><i class="fab fa-instagram fa-2x"></i></span>
			<span class="mx-2"><i class="fab fa-twitter fa-2x"></i></span>
			<span class="mx-2"><i class="fab fa-youtube fa-2x"></i></span>
		</div>
	</div>
	<div class="copy-right">
		<small class="text-muted">&copy; Copyright Rimer Shop 2020</small>
	</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/rimer-main-script.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function () {
		$('.sub-banner-center').slick({
			dots:true,
			autoplay:true,
			arrows:false,
		});
		$('.cat-top').slick({
			dots: false,
			arrows:false,
			infinite: false,
			slidesToShow: 10,
			slidesToScroll: 5,
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 8,
					slidesToScroll: 2,
					infinite: true,
					dots: false,
					arrows:true,
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 3,
					infinite: true,
					dots: false,
					arrows:true,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2,
					arrows:true,
				}
			}
			]
		});
		$('.sub-banner-left').slick({
			dots:false,
			arrows:false,
			infinite: true,
			fade: true,
			cssEase: 'linear',
			autoplay:true
		});
		$('.r-card-body-flash').slick({
			dots: false,
			arrows:true,
			infinite: false,
			slidesToShow: 5,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 4,
					infinite: true,
					dots: false,
					arrows:true,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: false,
					arrows:true,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows:false,
				}
			},
			{
				breakpoint: 320,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows:false,
				}
			}
			]
		});

		$('.slick-prev.slick-arrow').text(``);
		$('.slick-next.slick-arrow').text(``);
		$('.slick-prev.slick-arrow').html(`<i class="fas fa-chevron-left text-white"></i>`);
		$('.slick-next.slick-arrow').html(`<i class="fas fa-chevron-right text-white"></i>`);
	})
	$( window ).resize(function () {
		$('.slick-prev.slick-arrow').text(``);
		$('.slick-next.slick-arrow').text(``);
		$('.slick-prev.slick-arrow').html(`<i class="fas fa-chevron-left text-white"></i>`);
		$('.slick-next.slick-arrow').html(`<i class="fas fa-chevron-right text-white"></i>`);
	})
	$( window ).mousemove(function () {
		$('.slick-prev.slick-arrow').text(``);
		$('.slick-next.slick-arrow').text(``);
		$('.slick-prev.slick-arrow').html(`<i class="fas fa-chevron-left text-white"></i>`);
		$('.slick-next.slick-arrow').html(`<i class="fas fa-chevron-right text-white"></i>`);
	})

	$('.btn-open-cart').on('click',function () {
		$('#bottom-nav').addClass('z1000');
	})
	$('document').on('click',function () {
		$('#bottom-nav').removeClass('z1000');
	})
	// redirect by logo brand
	$('#logo-header').on('click',function () {
		window.location.replace('<?=base_url()?>');
	})

	//MOBILE BAR ACTION//
	$('.mobile-action .search').on('click',function () {
		$('.search-bar-mobile').addClass('show');
		$('.search-bar-mobile').addClass('slideInDown');
		$('.search-bar-mobile #keyword').attr('autofocus');
	})
	$('.search-bar-mobile .close').on('click',function () {
		$('.search-bar-mobile').removeClass('show');
		$('.search-bar-mobile').removeClass('slideInDown');
	})

	// let id = $('.card-product-inhome .product-item').attr('id');
	// console.log(id);
	$('.card-product-inhome .product-item').on('mouseenter',function () {
		let target = $(this).find('.img .action');
		target.addClass('show');
	})
	$('.card-product-inhome .product-item').on('mouseleave',function () {
		let target = $(this).find('.img .action');
		target.removeClass('show');
	})

	$('.btn-similiar-product').on('mouseenter',function () {
		$('.btn-similiar-product').addClass('darken');
		$('.btn-detail-product').addClass('lighten');
	})
	$('.btn-similiar-product').on('mouseleave',function () {
		$('.btn-similiar-product').removeClass('darken');
		$('.btn-detail-product').removeClass('lighten');
	})
	// OVERLAY EVENT
	$('.event-item').on('mouseenter',function () {
		let target = $(this).find('.overlay');
		let link = $(this).find('.link');
		let title = $(this).find('.text-title');
		let textAction = $(this).find('.text-action');
		console.log(textAction);
		target.addClass('show');
		link.addClass('show');
		title.addClass('d-none');
		textAction.addClass('show');
	})
	$('.event-item').on('mouseleave',function () {
		let target = $(this).find('.overlay');
		let link = $(this).find('.link');
		let title = $(this).find('.text-title');
		let textAction = $(this).find('.text-action');
		target.removeClass('show');
		link.removeClass('show');
		title.removeClass('d-none');
		textAction.removeClass('show');
	})
	//card item mobile
	$('.card-event-moblie .card-item .card-content').on('mouseenter',function () {
		let layerMenu = $(this).find('.layer-menu');
		let layerItem = $(this).find('.layer-item');
		layerMenu.addClass('show');
		layerItem.addClass('show');
	})
	$('.card-event-moblie .card-item .card-content').on('mouseleave',function () {
		let layerMenu = $(this).find('.layer-menu');
		let layerItem = $(this).find('.layer-item');
		layerMenu.removeClass('show');
		layerItem.removeClass('show');
	})

	// overlay editional feature
	$('.card-editional-feature').on('mouseenter',function () {
		let rOverlay = $(this).find('.r-overlay');
		let tOverlay = $(this).find('.text-overlay');
		let linkOverlay = $(this).find('.content-link-overly');
		rOverlay.addClass('show');
		linkOverlay.addClass('show');
		tOverlay.addClass('hide');
	})
	$('.card-editional-feature').on('mouseleave',function () {
		let rOverlay = $(this).find('.r-overlay');
		let tOverlay = $(this).find('.text-overlay');
		let linkOverlay = $(this).find('.content-link-overly');
		rOverlay.removeClass('show');
		linkOverlay.removeClass('show');
		tOverlay.removeClass('hide');
	})
	// MOBILE SIDE NAV
	$('.mobile-bars').on('click',function () {
		$(this).addClass('hidden');
		$('nav.sidebar-mobile').removeClass('collapsed');
	})
	$('#sidebar-mobile-close').on('click',function () {
		$('nav.sidebar-mobile').addClass('collapsed');
		$('.mobile-bars').removeClass('hidden');
	})
</script>
</body>
</html>