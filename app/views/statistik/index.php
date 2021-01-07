<script type="text/javascript" src="<?= base_url(); ?>/js/Chart.js"></script>
<div class="container">

  <!-- DATA STATISTIK INDONESIA-->
  <div id="data-indonesia" align="center" class="jumbotron pb-5 img-content color-light-font">
    <h1 class="mt-5">Data Statistik Indonesia</h1>
  </div>
  <!-- END DATA  STATISTIK Indonesia -->


  <!-- DATA  STATISTIK PER PROVINSI -->
  <div id="data-provinsi" align="center" class="jumbotron pb-5 mb-0 img-content color-light-font">
    <h1 class="mt-5">Data Per Provinsi</h1>
  </div>
  <ul id="daftar-provinsi" align="center" class="color-content hilang list-unstyled mb-0">

    <?php if (isset($domains)) : ?>
      <?php $i = 1;
      foreach ($domains as $domain) : ?>
        <?php if ($i == 1) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">SUMATERA</li>
        <?php elseif ($i == 11) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">JAWA</li>
        <?php elseif ($i == 17) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">BALI & NUSA TENGGARA</li>
        <?php elseif ($i == 20) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">KALIMANTAN</li>
        <?php elseif ($i == 25) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">SULAWESI</li>
        <?php elseif ($i == 31) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">MALUKU</li>
        <?php elseif ($i == 33) : ?>
          <li class="color-light-font pt-4 font-bold pb-1 pt-1">PAPUA</li>
        <?php endif;
        $i++; ?>
        <li class="color-light-font pb-1 pt-1"><a href="<?= base_url(); ?>/statistik/provinsi?domain_id=<?= $domain['domain_id'] ?>&nama_provinsi=<?= $domain['domain_name']  ?>">Provinsi <?= $domain['domain_name']; ?></a></li>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi internet</p>
    <?php endif ?>

  </ul>
  <div id="provinsi-toggle" style="border-radius: 0px 0px 20px 20px " class="color-blue-bg text-center">
    <h3><button class="bt-none color-light-font"><i class="fas fa-chevron-down"></i></button></h3>
  </div>
  <!-- END DATA  STATISTIK PER PROVINSI -->


  <div class="jumbotron mt-4">
    <h1 class="display-4" title="Statistik" data-toggle="popover" data-trigger="hover" data-content="Suatu kumpulan data yang berbentuk angka dan disusun dalam bentuk diagram dan/ atau tabel dimana isinya menjelaskan mengenai masalah tertentu.">Statistik</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
    <hr class="my-4">

    <!-- KASUS SELURUH INDONESIA-->
    <div class="row mb-5">
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-header">Terkonfirmasi</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($indo['confirmed']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-header">Sembuh</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($indo['recovered']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-header">Meninggal</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($indo['deaths']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-center">
          <div class="card-header">Update Terakhir</div>
          <div class="card-body">
            <h1 class="card-title"><?= date("j M", strtotime($indo['lastUpdate'])); ?></h1>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- DIAGRAM -->
  <!-- <div class="mb-5" style="width: 100%;height: 500px">
    <canvas id="myChart"></canvas>
  </div> -->
  <br><br>

  <!-- KASUS PER-PROVINSI -->
  <div class="row">
    <div class="col-md-4 mb-5">
      <h2 class="font-weight-bold">Kasus Per-Provinsi</h2>
      <div class="card">
        <div class="card-header">

          <!-- Dropdown Nama Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              <!-- Cek data dan session untuk menampilkan nama provinsi -->
              <?php

              // Cek ketersedian data dan session
              if (!empty($prov) && !empty($_SESSION['prov'])) {

                for ($i = 0; $i < count($prov); $i++) {

                  // Menampilkan nama provinsi sesuai dengan session
                  if ($prov[$i]['key'] == $_SESSION['prov']) {
                    echo $prov[$i]['key'];
                  }
                }
              } else {
                echo 'Pilih Provinsi';
              }
              ?>

            </button>

            <!-- From Pilih Provinsi -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="<?= base_url(); ?>/statistik" method="post">

                <!-- Cek ketersediaan data -->
                <?php if (!empty($prov)) : ?>

                  <!-- Value post diubah menjadi session di controller -->
                  <?php for ($i = 0; $i < count($prov); $i++) : ?>
                    <button class="dropdown-item" name="prov" value="<?= $prov[$i]['key']; ?>" type="submit"><?= $prov[$i]['key']; ?></button>
                  <?php endfor; ?>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

        <!-- List Data Kasus Provinsi Detail -->
        <ul class="list-group list-group-flush">

          <!-- Cek data dan session untuk menampilkan data provinsi -->
          <?php if (!empty($prov) && !empty($_SESSION['prov'])) : ?>

            <?php for ($i = 0; $i < count($prov); $i++) : ?>

              <!-- Menampilkan nama provinsi sesuai dengan session -->
              <?php if ($prov[$i]['key'] == $_SESSION['prov']) : ?>
                <li class="list-group-item">Terkonfirmasi: <span class="font-weight-bold"><?= number_format($prov[$i]['jumlah_kasus']); ?></span></li>
                <li class="list-group-item">Sembuh: <span class="font-weight-bold"><?= number_format($prov[$i]['jumlah_sembuh']); ?></span></li>
                <li class="list-group-item">Meninggal: <span class="font-weight-bold"><?= number_format($prov[$i]['jumlah_meninggal']); ?></span></li>
                <li class="list-group-item">Dirawat: <span class="font-weight-bold"><?= number_format($prov[$i]['jumlah_dirawat']); ?></span></li>
                <?php foreach ($prov[$i]['jenis_kelamin'] as $jenis_kelamin) : ?>
                  <li class="list-group-item"><?= ucfirst(strtolower($jenis_kelamin['key'])); ?>: <span class="font-weight-bold"><?= number_format($jenis_kelamin['doc_count']); ?></span></li>
                <?php endforeach; ?>
                <li class="list-group-item"><span class="font-weight-bold">Penambahan:</span></li>
                <li class="list-group-item"> Positif: <span class="font-weight-bold">+<?= number_format($prov[$i]['penambahan']['positif']); ?></span></li>
                <li class="list-group-item"> Sembuh: <span class="font-weight-bold">+<?= number_format($prov[$i]['penambahan']['sembuh']); ?></span></li>
                <li class="list-group-item"> Meninggal: <span class="font-weight-bold">+<?= number_format($prov[$i]['penambahan']['meninggal']); ?></span></li>
              <?php endif; ?>
            <?php endfor; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>



    <!-- STRATEGIC INDICATORS -->
    <div class="col-md-8 mb-5">
      <h2 class="font-weight-bold">Strategic Indicators</h2>
      <div class="card">
        <div class="card-header">
          <!-- Dropdown Pilih Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php

              // Cek ketersediaan data dan session nomor domain
              if (!empty($domains) && !empty($_SESSION['domain'])) {

                foreach ($domains as $domain) {

                  // Menampilkan nama provinsi sesuai dengan session
                  if ($domain['domain_id'] == $_SESSION['domain']) {
                    echo $domain['domain_name'];
                  }
                }
              } else {
                echo 'Pilih Provinsi';
              }
              ?>
            </button>

            <!-- Form Pilih Provinsi -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="<?= base_url(); ?>/statistik" method="post">

                <!-- Cek ketersediaan data domain -->
                <?php if (!empty($domains)) : ?>

                  <!-- Value post diubah menjadi session di controller -->
                  <?php foreach ($domains as $domain) : ?>
                    <button class="dropdown-item" name="domain" value="<?= $domain['domain_id']; ?>" type="submit"><?= $domain['domain_name']; ?></button>
                  <?php endforeach; ?>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

        <!-- List Data Strategic Indocators Provinsi Detail -->
        <ul class="list-group list-group-flush">

          <!-- cek ketersediaan data strategic inicators -->
          <?php if (!empty($indicators)) : ?>

            <!-- masuk ke array gabungan beberapa halaman -->
            <?php for ($i = 1; $i <= count($indicators); $i++) : ?>

              <!-- masuk ke array per-judul -->
              <?php for ($j = 0; $j <= count($indicators[$i]['data'][1]); $j++) : ?>

                <!-- cek ketersedian nomor array per-judul -->
                <?php if (!empty($indicators[$i]['data'][1][$j])) : ?>
                  <li class="list-group-item"><?= $indicators[$i]['data'][1][$j]['title']; ?>: <span class="font-weight-bold">
                      <?= $indicators[$i]['data'][1][$j]['value']; ?></span>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>
            <?php endfor; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>

  </div>

  <!-- SURVEI -->
  <div class="row">
    <div class="col-12">
      <div id="data-provinsi" align="center" class="jumbotron color-content pt-5 slide-wrapper">


        <h4 class="mb-5 font-weight-bold color-blue-font">SURVEI INTERNAL</h4>
        <!-- Jumlah survei = jumlah pertanyaan -->
        <ul class="slide mt-3" id="nomor-slide">
          <?php if (isset($pertanyaan)) : ?>
            <?php foreach ($pertanyaan as $p) : ?>
              <li class="row m-3 text-center justify-content-center" style="width:100%;box-shadow:none;">

                <div class="col-lg-6">
                  <div class="chart-pie">
                    <canvas id="<?= $p['id']  ?>"></canvas>
                  </div>
                </div>

                <div class="col-lg-4 pt-4">
                  <div class="list-group color-none-bg">

                    <!-- Menampilkan kalkulasi jawaban sesuai pertanyaan -->
                    <?php $tempArr = [] ?>
                    <?php foreach ($jawaban as $j) : ?>
                      <?php if ($j['id_pertanyaan'] == $p['id']) : ?>
                        <?php
                        $arr = array_count_values($hasil_survei);
                        $ark = array_keys(array_count_values($hasil_survei));
                        foreach ($ark as $k) {
                          if ($k == $j['id']) {
                            echo '<div class="list-group-item d-flex justify-content-between align-items-center" id="' . $j['id'] . '" data-' . $j['id'] . '="' . $arr[$k] . '">
                        ' . $j['jawaban'] . '
                        <span class="badge badge-primary badge-pill">' . $arr[$k] . '</span>
                      </div>';
                          }
                        }
                        ?>
                        </span></h6>

                      <?php endif; ?>
                    <?php endforeach; ?>

                  </div>
                </div>

              </li>
            <?php endforeach; ?>

        </ul>
      <?php else : ?>
        <div class="container">
          <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi database</p>
        </div>
      <?php endif; ?>

      <div class="wrap-controls">
        <div class="arrow-nav">
          <button class="prev"></button>
        </div>
        <ul id="circle-pointer" class="circle-controls">
          <li></li>
        </ul>
        <div class="ml-2 arrow-nav">
          <button class="next"></button>
        </div>
      </div>


      </div>
    </div>
  </div>
  <!-- END SURVEI -->

</div>



<!-- 
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["<?php  //join('", "', $data['dayone']['date']); 
                ?>"],
      datasets: [{
          label: 'Terkonfirmasi',
          data: [<?php  //join(', ', $data['dayone']['confirmed']); 
                  ?>],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        },
        {
          label: 'Sembuh',
          data: [<?php  //join(', ', $data['dayone']['recovered']); 
                  ?>],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'Meninggal',
          data: [<?php  //join(', ', $data['dayone']['deaths']); 
                  ?>],
          backgroundColor: 'rgba(255, 206, 86, 0.2)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
        },
        {
          label: 'Aktif',
          data: [<?php //join(', ', $data['dayone']['active']); 
                  ?>],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script> -->