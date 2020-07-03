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
      <h3 class="brand-name d-md-block d-none">Forum</h3>
    </div>
    <div class="center d-none">
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
      <?php if($this->session->userdata('role_id') != 1): ?>
        <a href="<?=base_url('report/create/'); ?>" class="text-white card-link ml-3"><i class="fas fa-pencil-alt border rounded p-1"></i></a>
      <?php endif; ?>

      <?php if($this->session->userdata('role_id') != 3) : ?>
        <a href="<?=base_url('announcement'); ?>" class="text-white card-link ml-3"><i class="fas fa-broadcast-tower border rounded p-1"></i></a>
      <?php endif; ?>


        <button type="button" class="btn text-white" data-toggle="modal" data-target="#modal_logout" onclick="playsoundlogout()">
          <i class="fas fa-sign-out-alt border rounded p-1"></i>
        </button>
    </div>
  </nav>
  <div class="content-wrapper" style="position: relative;">

  <div class="modal pulse" id="modal_logout">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content" style="border: 2px solid #100;">
        <div class="modal-body">
          <span class="text-center d-block">Apakah anda akan logout ?</span>
        </div>
        <div class="d-flex justify-content-between px-3 py-2">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">TIDAK</button>
          <a href="<?=base_url('auth/logout/') ?>" type="button" class="btn btn-sm btn-primary px-4">YA</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function playsoundlogout() {
      const audio = new Audio('<?=base_url('assets/audio/__logout2.mp3')?>');
      audio.volume = .5;
      audio.play();
    }
  </script>