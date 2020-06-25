<?php $menu = $this->session->userdata('menu_user'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="theme-color" content="#00A2FF"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title ?> | FORUM</title>
  <link rel="shortcut icon" href="<?=base_url('assets/icons/favicon.jpeg') ?>" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/all.min.css">
  <!-- #00A2FF -->
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

  <!-- SLICK SLIDER -->
  <link rel="stylesheet" href="<?=base_url()?>assets/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/slick/slick-theme.css">


  <!-- CUSTOM STYLE -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">

  <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/slick/slick.min.js"></script>
</head>
<body style="background-color: #EEEF;">
  <nav class="main-nav">
    <div class="left d-flex align-items-center">
      <img class="mr-2 rounded-circle" width="30" height="30" src="<?=base_url('assets/icons/favicon.jpeg') ?>" alt="">
      <h3 class="brand-name">Forum</h3>
    </div>
    <div class="center">
        <input type="text" class="form-control form-control-sm text-center" placeholder="cari...">
    </div>
    <div class="right">
      <div class="menu-item">
        <?php foreach($menu as $m) : ?>
          <a href="<?=base_url().$m->menu_url; ?>" class="menu-link">
            <img class="img-fluid" src="<?=base_url('assets/icons/').$m->menu_icon;?>" alt="">
          </a>
        <?php endforeach; ?>
      </div>

      <?php if($this->session->userdata('role_id') == 3): ?>
        <a href="<?=base_url('report/create/'); ?>" class="text-white card-link ml-3"><i class="fas fa-pencil-alt border p-1"></i></a>
      <?php endif; ?>
    </div>
  </nav>
  <div class="content-wrapper" style="position: relative;">