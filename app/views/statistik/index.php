<div class="container">
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
            <h1 class="card-title"><?= date("d/m", strtotime($data['indo']['lastUpdate'])); ?></h1>
          </div>
        </div>
      </div>
    </div>

  </div>



  <!-- KASUS PER-PROVINSI -->
  <div class="row">
    <div class="col-6 mb-5">
      <div class="card">
        <div class="card-header">

          <!-- Dropdown Nama Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

              <!-- Cek data dan session untuk menampilkan nama provinsi -->
              <?php 

                // Cek ketersedian data dan session
                if( !empty($data['prov']) && !empty($_SESSION['prov']) ) {

                  for($i=0; $i < count($data['prov']); $i++) {

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
                <?php if (!empty($data['prov'])): ?>

                <!-- Value post diubah menjadi session di controller -->
                <?php for ($i=0; $i < count($data['prov']); $i++): ?>
                <button class="dropdown-item" name="prov" value="<?= $data['prov'][$i]['key']; ?>"
                  type="submit"><?= $data['prov'][$i]['key']; ?></button>
                <?php endfor; ?>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

        <!-- List Data Kasus Provinsi Detail -->
        <ul class="list-group list-group-flush">

          <!-- Cek data dan session untuk menampilkan data provinsi -->
          <?php if (!empty($data['prov']) && !empty($_SESSION['prov'])): ?>

          <?php for ($i=0; $i < count($data['prov']); $i++): ?>

          <!-- Menampilkan nama provinsi sesuai dengan session -->
          <?php if ($data['prov'][$i]['key'] == $_SESSION['prov']): ?>
          <li class="list-group-item">Terkonfirmasi: <?= number_format($data['prov'][$i]['jumlah_kasus']); ?></li>
          <li class="list-group-item">Sembuh: <?= number_format($data['prov'][$i]['jumlah_sembuh']); ?></li>
          <li class="list-group-item">Meninggal: <?= number_format($data['prov'][$i]['jumlah_meninggal']); ?></li>
          <li class="list-group-item">Dirawat: <?= number_format($data['prov'][$i]['jumlah_dirawat']); ?></li>
          <?php endif; ?>
          <?php endfor; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>



    <!-- STRATEGIC INDICATORS -->
    <div class="col-6 mb-5">
      <div class="card">
        <div class="card-header">
          <!-- Dropdown Pilih Provinsi -->
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php 

                // Cek ketersediaan data dan session nomor domain
                if( !empty($data['domain']) && !empty($_SESSION['domain']) ) {

                  foreach($data['domain'] as $domain) {

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
                <?php if (!empty($data['domain'])): ?>
                
                <!-- Value post diubah menjadi session di controller -->
                <?php foreach($data['domain'] as $domain): ?>
                <button class="dropdown-item" name="domain" value="<?= $domain['domain_id']; ?>"
                  type="submit"><?= $domain['domain_name']; ?></button>
                <?php endforeach; ?>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

        <!-- List Data Strategic Indocators Provinsi Detail -->
        <ul class="list-group list-group-flush">

          <!-- cek ketersediaan data strategic inicators -->
          <?php if (!empty($data['strategic'])): ?>

          <?php foreach($data['strategic'] as $strategic): ?>
          <li class="list-group-item"><?= $strategic['title']; ?>: <p class="font-weight-bold">
              <?= $strategic['value']; ?></p>
          </li>
          <?php endforeach; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </div>


</div>