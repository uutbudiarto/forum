<nav class="top-nav">
	<div class="left">
		<a href="http://localhost/seller-rimershop" target="blank" class="action">Seller</a>
		<a href="#" class="action">Download</a>
		<a href="#" class="action">Bahasa</a>
	</div>
	<div class="right">
		<div class="action">
			<a href="" class="saldo">Saldo</a>
			<a href="" class="order">Track Order</a>
		</div>
		<div class="auth">
			<a href="<?=base_url('auth/register')?>">Daftar</a>
			<span>|</span>
			<a href="<?=base_url('auth')?>">Masuk</a>
		</div>
	</div>
</nav>
<nav class="main-nav">
	<div class="left">
		<img id="logo-header" class="rimer-header-logo" src="<?=base_url('assets/img/logo/logo-header.png');?>" alt="rimerLogo">
	</div>
	<div class="center">
		<form action="">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Cari Produk...">
				<div class="input-group-append">
					<button class="btn btn-search btn-r-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
	<div class="right">
		<a href="" class="action">
			<i class="fas fa-sync-alt"></i>
			<span></span>
		</a>
		<a href="" class="action">
			<i class="fas fa-heart"></i>
			<span></span>
		</a>
		<div class="dropdown cart">
			<button class="btn btn-sm btn-open-cart action" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-shopping-cart"></i>
				<span>9</span>
			</button>
			<div class="dropdown-menu zoomIn dropdown-menu-cart shadow" id="dropdown-menu-cart">
				<?php $isVal = 1; ?>
				<?php if ($isVal): ?>
					<div class="cart-value p-2">
						<?php for ($i=1; $i < 10; $i++) : ?>
							<div class="cart-items">
								<img class="cart-value-img" src="<?=base_url('assets/img/dummy/detail-dummy/1.png')?>" alt="">
								<div class="cart-value-name">
									<span>this for produk name Lorem ipsum dolor sit amet, consectetur.</span>
									<span class="text-muted">varian : 256Tyug</span>
								</div>
								<div class="cart-value-action">
									<span class="text-danger">Rp.100.000,-</span>
									<a href="javascript:void(0)" class="badge badge-danger">Hapus</a>
								</div>
							</div>
							<hr>
						<?php endfor; ?>
						<div class="footer-cart py-2 text-right">
							<button class="btn btn-r-primary rounded-0" id="btnShowCartDetail">Tampilkan Keranjang Belanja</button>
						</div>
					</div>
					<?php else: ?>
						<img width="80" class="mx-auto d-block" src="<?=base_url('assets/img/rimer-icons/no-cart.png')?>" alt="rimer shop cart zero">
						<small class="font-font-weight-lighter text-danger d-block text-center">Belum ada barang dikeranjang</small>
					<?php endif ?>
				</div>
			</div>
		</div>
	</nav>
	<nav class="bottom-nav" id="bottom-nav">
		<div class="left category">
			<button class="btn btn-block btn-menu-category" id="btn-drop-category">
				<i class="fas fa-list"></i> KATEGORI
			</button>
		</div>
		<div class="center">
			<a href="" class="main-menu">
				<span>Promo</span>
			</a>
			<a href="" class="main-menu">
				<span>Diskon</span>
			</a>
			<a href="" class="main-menu">
				<span>Flashsale</span>
			</a>
			<a href="" class="main-menu">
				<span>Kupon</span>
			</a>
		</div>
		<div class="right">
			<a href="" class="help">Batuan</a>
		</div>
	</nav>

	<!-- category -->
	<div class="box-category">
		<div class="row main-box-category">
			<?php foreach ($category as $ctg): ?>
			 <div class="col-lg-3 box-sub-category">
					<h3 class="title-category border-bottom"><a href=""><strong><?=$ctg['category'];?></a></strong></h3>
						<div class="sub_category_item" style="height: 230px; overflow-y: auto;">
							<?php foreach ($sub_category as $sc): ?>
									<?php if ($ctg['id'] == $sc['category_id']): ?>						
										<h5 class="title-sub-category"><a href=""><?=$sc['sub_category'];?></a></h5>					
									<?php endif ?>							
							<?php endforeach; ?>
						</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="text-right container border-bottom-r-primary py-3 mb-2">
			<a class="mr-5 pr-5 text-r-primary" href="<?=base_url('category')?>">Semua Kategori <i class="fas fa-arrow-right"></i></a>
		</div>
	</div>
	<!-- category -->

	<nav class="mobile-top-nav">
		<div class="mobile-bars">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="brand-mobile-logo">
			<img class="rimer-header-logo" src="<?=base_url('assets/img/logo/logo-header.png');?>" alt="rimerLogo">
		</div>
		<div class="mobile-action">
			<a href="javascript:void(0)" class="search"><i class="fas fa-search"></i></a>
			<a href="javascript:void(0)" class="signin"><i class="fas fa-sign-in-alt"></i></a>
			<a href="javascript:void(0)" class="cart btn-open-cart action">
				<i class="fas fa-shopping-cart"></i>
				<span>10</span>
			</a>
		</div>
		<div class="search-bar-mobile">
			<div class="box-mobile-search">
				<form action="">
					<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari Produk">				
				</form>
			</div>
			<div class="close text-right">
				<a href="javascript:void(0)">
					<img width="25" class="ml-2" src="<?=base_url('assets/img/rimer-icons/close.svg')?>" alt="">
				</a>
			</div>
		</div>	
	</nav>

	<!-- SIDEBAR MOBILE -->
	<nav class="sidebar-mobile collapsed">
		<div class="sidebar-header">
			<div class="left">
				<img id="sidebar-mobile-logo" src="<?=base_url('assets/img/logo/logo-header.png')?>" alt="rimershop">
			</div>
			<div class="right">
				<img id="sidebar-mobile-close" src="<?=base_url('assets/img/rimer-icons/close.svg')?>" alt="close">
			</div>
		</div>
		<div class="sidebar-body">
			<div class="profile">
				<div class="avatar">
					<img src="<?=base_url('assets/img/avatar/default.svg')?>" alt="avatar">
					<span>User Rimer</span>
				</div>
				<div class="saldo">
					<div class="rimer-pay">
						<img width="30" src="<?=base_url('assets/img/rimer-icons/rimer-saldo.svg');?>" alt="">
						<span class="text-white">205.000</span>
					</div>
					<div class="rimer-saldo">
						<img width="30" src="<?=base_url('assets/img/rimer-icons/rimer-pay.svg');?>" alt="">
						<span class="text-white">20.100</span>
					</div>
				</div>
			</div>
			<div class="menu">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Pesanan Saya
						<span class="badge badge-primary badge-pill">1</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Orderan Masuk
						<span class="badge badge-primary badge-pill">9</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Kelola Toko
						<i class="fas fa-store text-primary"></i>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Pusat Bantuan
						<i class="fas fa-question text-primary"></i>
					</li>
				</ul>		
			</div>
		</div>
		<div class="sidebar-footer">
			<a class="text-r-primary" href=""><i class="fas fa-store"></i></a>
			<a class="text-r-primary" href=""><i class="fas fa-comment-alt"></i></a>
			<a class="text-r-primary" href=""><i class="fas fa-user"></i></a>
			<a class="text-r-primary" href=""><i class="fas fa-cog"></i></a>
		</div>
	</nav>


	<script type="text/javascript">
	// SIMULAI MELIHAT DETAIL KERANJANG
	$('#btnShowCartDetail').on('click',function () {
		window.location.replace("<?=base_url('cart/show_cart/')?>");
	})
	if ($('body').width() < 576) {
		$('.btn-open-cart').on('click',function () {
		window.location.replace("<?=base_url('cart/show_cart/')?>");
	})
	}
		//behavior sidebar category//
	$('#btn-drop-category').on('click',function () {
		$('.box-category').toggleClass('show');
		$('.box-category').toggleClass('slideInUp');
		$('.btn-menu-category').toggleClass('bordered');
	})
	$('.box-category').on('mouseleave',function () {
		$('.box-category').removeClass('show');
		$('.box-category').removeClass('slideInUp');
		$('.btn-menu-category').removeClass('bordered');
	})
	//behavior sidebar category//
</script>
