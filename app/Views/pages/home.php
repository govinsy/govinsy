<?= $this->extend('templates/base') ?>
<?= $this->section('content') ?>
<div class="container">
  <?= session()->getFlashdata('message') ?>
  <div class="jumbotron mt-4">
    <h1 class="display-4">Selamat Datang di Govinsy!</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
  </div>

</div>
<?= $this->endSection() ?>
