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
    <?php if ($data['prov'] != NULL): ?>
    <?php for ($i=0; $i < count($data['prov']); $i++): ?>
      <div class="col-3 mb-5">
        <div class="card">
          <div class="card-header">
            <?= $data['prov'][$i]['key']; ?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Terkonfirmasi: <?= number_format($data['prov'][$i]['jumlah_kasus']); ?></li>
            <li class="list-group-item">Sembuh: <?= number_format($data['prov'][$i]['jumlah_sembuh']); ?></li>
            <li class="list-group-item">Meninggal: <?= number_format($data['prov'][$i]['jumlah_meninggal']); ?></li>
            <li class="list-group-item">Dirawat: <?= number_format($data['prov'][$i]['jumlah_dirawat']); ?></li>
          </ul>
        </div>
      </div>
    <?php endfor; ?>
    <?php endif; ?>
    </div>
    

    <!-- Daftar domain provinsi-->
    <div class="row">
    <?php if ($data['domain'] != NULL): ?>
      <?php foreach($data['domain'] as $domain): ?>
        <div class="col-3 mb-3">
          <div class="card">
            <div class="card-header">
            <?= $domain['domain_name']; ?>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?= $domain['domain_id']; ?></li>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>


    <!-- Daftar Strategic Indocator-->
    <div class="row">
    <?php if ($data['strategic'] != NULL): ?>
      <?php foreach($data['strategic'] as $strategic): ?>
        <div class="col-4 mb-3">
          <div class="card">
            <div class="card-header">
            <?= $strategic['title']; ?>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?= $strategic['value']; ?></li>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>


</div>


