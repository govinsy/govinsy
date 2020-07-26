<div class="container">
  <div class="jumbotron mt-4">
    <h1 class="display-4">Statistik</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
    <hr class="my-4">

    <!-- Kasus Seluruh Indonesia -->
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


  <!-- Kasus Per-Provinsi -->
  <div class="row">
    <div class="col-6 mb-5">
      <div class="card">
        <div class="card-header">
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php 
                if( !empty($data['prov']) && !empty($_POST['prov']) ) {
                  for($i=0; $i < count($data['prov']); $i++) {
                    if ($data['prov'][$i]['key'] == $_POST['prov']) {
                      echo $data['prov'][$i]['key'];
                    }
                  }
                } else {
                  echo 'Pilih Provinsi';
                } 
              ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="<?= BASEURL; ?>/statistik" method="post">
                <?php if ($data['prov'] != NULL): ?>
                <?php for ($i=0; $i < count($data['prov']); $i++): ?>
                <button class="dropdown-item" name="prov" value="<?= $data['prov'][$i]['key']; ?>"
                  type="submit"><?= $data['prov'][$i]['key']; ?></button>
                <?php endfor; ?>
                <?php endif; ?>
              </form>
            </div>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <?php if (!empty($data['prov']) && !empty($_POST['prov'])): ?>
          <?php for ($i=0; $i < count($data['prov']); $i++): ?>
          <?php if ($data['prov'][$i]['key'] == $_POST['prov']): ?>
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


    <!-- Strategic Indicator -->
    <div class="col-6 mb-5">
      <div class="card">
        <div class="card-header">
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php 
                if( !empty($data['domain']) && !empty($_POST['domain']) ) {
                  foreach($data['domain'] as $domain) {
                    if ($domain['domain_id'] == $_POST['domain']) {
                      echo $domain['domain_name'];
                    }
                  }
                } else {
                  echo 'Pilih Provinsi';
                } 
              ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form action="<?= BASEURL; ?>/statistik" method="post">
                <?php if ($data['domain'] != NULL): ?>
                <?php foreach($data['domain'] as $domain): ?>
                <button class="dropdown-item" name="domain" value="<?= $domain['domain_id']; ?>"
                  type="submit"><?= $domain['domain_name']; ?></button>
                <?php endforeach; ?>
                <?php endif; ?>
              </form>
            </div>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <?php if ($data['strategic'] != NULL): ?>
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