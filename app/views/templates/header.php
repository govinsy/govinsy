<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="<?= base_url(); ?>/img/icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <!---   Css Assets    -->
  <link rel="stylesheet" href="<?= base_url(); ?>/css/sb-admin-2.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/pace-theme-minimal.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/fontawsome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/jquery.enhanced-switch-pingpong.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

  <?php if ($page == "Statistik" || $page == "Survei") :  ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/css/slider.css">
  <?php endif; ?>

  <?php if ($page == "Profile") :  ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/css/image-cropper/dropzone.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/image-cropper/cropper.css">
  <?php endif; ?>
  <!---  End Css Assets    -->

  <title><?= $judul; ?></title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div class="<?php if (isset($_SESSION['profile']['tema'])) {
                if ($_SESSION['profile']['tema'] == 1) {
                  echo "light-mode";
                } else echo "dark-mode";
              } else echo "dark-mode"; ?>" id="wrapper">