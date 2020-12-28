<?= $this->extend('templates/base') ?>
<?= $this->section('content') ?>
<div class="container">

  <!-- DATA STATISTIK INDONESIA-->
  <div id="data-indonesia" align="center" class="jumbotron pb-5 img-content color-light-font">
    <h1 class="mt-5">Data Statistik Indonesia</h1>
  </div>
  <!-- END DATA  STATISTIK Indonesia -->


  <!-- DATA  STATISTIK PER PROVINSI -->
  <div id="domain"></div>

  <div class="jumbotron mt-4">
    <h1 class="display-4">Statistik</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
    <hr class="my-4">

    <!-- KASUS SELURUH INDONESIA-->
    <div id="covid_id"></div>
    
  </div>

  <!-- DIAGRAM -->
  <div id="covid_dayone"></div>
  <div id="covid_prov"></div>

  <!-- SURVEYS -->
  <div id="surveys"></div>

<script src="<?= base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#domain').load('<?= $domain ?>')
        $('#covid_id').load('<?= $covid_id ?>')
        $('#covid_dayone').load('<?= $covid_dayone ?>')
        $('#covid_prov').load('<?= $covid_prov ?>')
        $('#surveys').load('<?= $surveys ?>')
    })
</script>
<?= $this->endSection() ?>