<script type="text/javascript" src="<?= BASEURL; ?>/js/Chart.js"></script>
<div class="container">

  <div align="center" class="jumbotron mt-4 justify-content-end">
    <h1 class="display-4">Data Statistik Indonesia</h1>

  </div>

  <div class="jumbotron mt-4">
    <h1 class="display-4">Statistik</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
    <hr class="my-4">

    <!-- KASUS SELURUH INDONESIA-->
    <div class="row mb-5">
      <div class="col-3">
        <div class="card text-center">
          <div class="card-header">Terkonfirmasi</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($data['indo']['confirmed']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card text-center">
          <div class="card-header">Sembuh</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($data['indo']['recovered']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card text-center">
          <div class="card-header">Meninggal</div>
          <div class="card-body">
            <h1 class="card-title"><?= number_format($data['indo']['deaths']['value']); ?></h1>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card text-center">
          <div class="card-header">Update Terakhir</div>
          <div class="card-body">
            <h1 class="card-title"><?= date("F j", strtotime($data['indo']['lastUpdate'])); ?></h1>
          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="mb-5" style="width: 100%;height: 500px">
    <canvas id="myChart"></canvas>
  </div>

  <br><br>

  <!-- KASUS PER-PROVINSI -->
  <div class="row mt-5">
    <div class="col-4 mb-5">
      <h2 class="font-weight-bold">Kasus Per-Provinsi</h2>
      <div class="card">
        <div class="card-header">

          <!-- Dropdown Nama Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              <!-- Cek data dan session untuk menampilkan nama provinsi -->
              <?php

              // Cek ketersedian data dan session
              if (!empty($data['prov']) && !empty($_SESSION['prov'])) {

                for ($i = 0; $i < count($data['prov']); $i++) {

                  // Menampilkan nama provinsi sesuai dengan session
                  if ($data['prov'][$i]['key'] == $_SESSION['prov']) {
                    echo $data['prov'][$i]['key'];
                  }
                }
              } else {
                echo 'Pilih Provinsi';
              }
              ?>

            </button>

            <!-- From Pilih Provinsi -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="<?= BASEURL; ?>/statistik" method="post">

                <!-- Cek ketersediaan data -->
                <?php if (!empty($data['prov'])) : ?>

                  <!-- Value post diubah menjadi session di controller -->
                  <?php for ($i = 0; $i < count($data['prov']); $i++) : ?>
                    <button class="dropdown-item" name="prov" value="<?= $data['prov'][$i]['key']; ?>" type="submit"><?= $data['prov'][$i]['key']; ?></button>
                  <?php endfor; ?>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

        <!-- List Data Kasus Provinsi Detail -->
        <ul class="list-group list-group-flush">

          <!-- Cek data dan session untuk menampilkan data provinsi -->
          <?php if (!empty($data['prov']) && !empty($_SESSION['prov'])) : ?>

            <?php for ($i = 0; $i < count($data['prov']); $i++) : ?>

              <!-- Menampilkan nama provinsi sesuai dengan session -->
              <?php if ($data['prov'][$i]['key'] == $_SESSION['prov']) : ?>
                <li class="list-group-item">Terkonfirmasi: <span class="font-weight-bold"><?= number_format($data['prov'][$i]['jumlah_kasus']); ?></span></li>
                <li class="list-group-item">Sembuh: <span class="font-weight-bold"><?= number_format($data['prov'][$i]['jumlah_sembuh']); ?></span></li>
                <li class="list-group-item">Meninggal: <span class="font-weight-bold"><?= number_format($data['prov'][$i]['jumlah_meninggal']); ?></span></li>
                <li class="list-group-item">Dirawat: <span class="font-weight-bold"><?= number_format($data['prov'][$i]['jumlah_dirawat']); ?></span></li>
                <?php foreach ($data['prov'][$i]['jenis_kelamin'] as $jenis_kelamin) : ?>
                  <li class="list-group-item"><?= ucfirst(strtolower($jenis_kelamin['key'])); ?>: <span class="font-weight-bold"><?= number_format($jenis_kelamin['doc_count']); ?></span></li>
                <?php endforeach; ?>
                <li class="list-group-item"><span class="font-weight-bold">Penambahan:</span></li>
                <li class="list-group-item"> Positif: <span class="font-weight-bold">+<?= number_format($data['prov'][$i]['penambahan']['positif']); ?></span></li>
                <li class="list-group-item"> Sembuh: <span class="font-weight-bold">+<?= number_format($data['prov'][$i]['penambahan']['sembuh']); ?></span></li>
                <li class="list-group-item"> Meninggal: <span class="font-weight-bold">+<?= number_format($data['prov'][$i]['penambahan']['meninggal']); ?></span></li>
              <?php endif; ?>
            <?php endfor; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>



    <!-- STRATEGIC INDICATORS -->
    <div class="col-8 mb-5">
      <h2 class="font-weight-bold">Strategic Indicators</h2>
      <div class="card">
        <div class="card-header">
          <!-- Dropdown Pilih Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php

              // Cek ketersediaan data dan session nomor domain
              if (!empty($data['domain']) && !empty($_SESSION['domain'])) {

                foreach ($data['domain'] as $domain) {

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
              <form action="<?= BASEURL; ?>/statistik" method="post">

                <!-- Cek ketersediaan data domain -->
                <?php if (!empty($data['domain'])) : ?>

                  <!-- Value post diubah menjadi session di controller -->
                  <?php foreach ($data['domain'] as $domain) : ?>
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
          <?php if (!empty($data['indicators'])) : ?>

            <!-- masuk ke array gabungan beberapa halaman -->
            <?php for ($i = 1; $i <= count($data['indicators']); $i++) : ?>

              <!-- masuk ke array per-judul -->
              <?php for ($j = 0; $j <= count($data['indicators'][$i]['data'][1]); $j++) : ?>

                <!-- cek ketersedian nomor array per-judul -->
                <?php if (!empty($data['indicators'][$i]['data'][1][$j])) : ?>
                  <li class="list-group-item"><?= $data['indicators'][$i]['data'][1][$j]['title']; ?>: <span class="font-weight-bold">
                      <?= $data['indicators'][$i]['data'][1][$j]['value']; ?></span>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>
            <?php endfor; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>


    <!-- STATICTABLE -->
    <!-- <div class="card" style="width: 18rem;">
      <div class="card-header">
        Statictable
      </div>
      <ul class="list-group list-group-flush">
        <?php for ($i = 0; $i < count($data['statictable']); $i++) : ?>
        <li class="list-group-item"><?= $data['statictable'][$i]['Realisasi Proyek, Nilai Investasi dan Tenaga Kerja Penanaman Modal Asing (PMA) Menurut Negara di Provinsi Jawa Tengah, 2019']; ?></li>
        <?php endfor; ?>
      </ul>
    </div> -->

  </div>
</div>

<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["<?= join('", "', $data['dayone']['date']); ?>"],
      datasets: [{
          label: 'Terkonfirmasi',
          data: [<?= join(', ', $data['dayone']['confirmed']); ?>],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        },
        {
          label: 'Sembuh',
          data: [<?= join(', ', $data['dayone']['recovered']); ?>],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'Meninggal',
          data: [<?= join(', ', $data['dayone']['deaths']); ?>],
          backgroundColor: 'rgba(255, 206, 86, 0.2)',
          borderColor: 'rgba(255, 206, 86, 1)',
          borderWidth: 1
        },
        {
          label: 'Aktif',
          data: [<?= join(', ', $data['dayone']['active']); ?>],
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
</script>