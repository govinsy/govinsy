<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
      <a class="navbar-brand" href="<?= BASEURL; ?>"><img src="<?= BASEURL;?>/img/govinsy-black.png" width="10%" alt="" loading="lazy"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?= BASEURL; ?>/statistik">Statistik</a>
          <a class="nav-item nav-link" href="<?= BASEURL; ?>/berita">Berita</a>
          <a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About</a>
          <?php if(isset($_SESSION['login'])): ?>
            <?php if(isset($_SESSION['profile'])): ?>
            <a class="nav-item nav-link" href="<?= BASEURL; ?>/pengguna/login"><?= str_replace(' ', '', $_SESSION['profile']['nama']); ?></a>
            <?php endif; ?>
          <a class="nav-item nav-link text-danger" href="<?= BASEURL; ?>/pengguna/logout">Keluar</a>
          <? else: ?>
          <a class="nav-item nav-link text-primary" href="<?= BASEURL; ?>/pengguna/login">Masuk</a>
          <?php endif; ?>
        </div>
      </div>
  </div>
</nav>