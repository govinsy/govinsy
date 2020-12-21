<div class="container" id="page" data-page="Statistik">


  <!-- Map Provinsi -->
  <div class="row justify-content-center">
    <div class="col-lg-12 mb-5">

      <div class="jumbotron border-gray-1 justify-content-center color-bg mb-4 shadow corner-round">


        <!-- Hoverable map -->

        <div class="row  corner-round">
          <div class="col-lg-8">

            <?php readfile(base_url() . '/img/map_indonesia.html');    ?>


            <!-- Deskripsi map  -->
            <div class="descriptions color-content shadow">
              <?php foreach ($desc as $des) :  ?>
                <div class="map-prov hilang <?= $des['id_prov'] ?>">
                  <div class="row">
                    <div class="col-sm-12 text-center">

                      <img width="8%" src="<?= base_url(); ?>/img/provinsi/logo/<?= $des['id_prov'] ?>.png">
                      <p class="font-20 mt-2 font-weight-bold color-content-font"><?= $des['Provinsi'] ?></p>
                      <hr class="color-gray-bg">
                      <small class="text-gray-600 font-12" style="margin-top: 0px">JUMLAH PENDUDUK</small>
                      <p class="font-16 font-weight-bold color-content-font"><?= $des['Populasi'] ?> <sub>Jiwa</sub></p>
                      <small class="text-gray-600 font-12" style="margin-top: 0px">LUAS WILAYAH</small>
                      <p class="font-16 font-weight-bold color-content-font"><?= $des['Luas Total'] ?> <sub>KM <sup>2</sup></sub></p>

                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <!-- Deskripsi map End -->



          </div>
          <div class="col-lg-4 color-content corner-round shadow color-content-font px-4 hilang py-3" id="map_desc" data-url="<?= base_url() ?>">
            <h4 class="font-weight-bold">Provinsi</h4>
            <div id="map_spot" class="corner-round my-4"></div><br>
            <p id="luas_wilayah" class="font-16 font-weight-bold color-blue-font  float-right">0 <sub>KM <sup>2</sup></sub></p>
            <p class="font-16">Luas Wilayah</p>
            <p id="populasi" class="font-16 font-weight-bold color-blue-font float-right">0 <sub>Jiwa</sub></p>
            <p class="font-16">Populasi</p>
            <a href="" class="px-5 btn btn-blue corner-round my-4" style="width:100%">Lihat Statistik <i class="fas fa-fw fa-arrow-right"></i></a>
          </div>
        </div>
        <!-- Hoverable map End -->




      </div>


    </div>
  </div>
  <!-- END Map Provinsi -->


  <!-- DATA  STATISTIK PER PROVINSI -->
  <div id="data-provinsi" align="center" class="jumbotron shadow pb-5 mb-0 img-content color-light-font">
    <h1 class="mt-5">Data Per Provinsi</h1>
  </div>
  <ul id="daftar-provinsi" align="center" class="color-content shadow color-content-font hilang list-unstyled mb-0">

    <?php if (isset($domains)) : ?>
      <?php $i = 1;
      foreach ($domains as $domain) : ?>
        <?php if ($i == 1) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">SUMATERA</li>
        <?php elseif ($i == 11) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">JAWA</li>
        <?php elseif ($i == 17) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">BALI & NUSA TENGGARA</li>
        <?php elseif ($i == 20) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">KALIMANTAN</li>
        <?php elseif ($i == 25) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">SULAWESI</li>
        <?php elseif ($i == 31) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">MALUKU</li>
        <?php elseif ($i == 33) : ?>
          <li class="pt-4 font-bold pb-1 pt-1">PAPUA</li>
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