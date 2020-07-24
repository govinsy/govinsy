<div class="container">
    <div class="jumbotron mt-4">
      <h1 class="display-4">Statistik</h1>
      <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
      <hr class="my-4">

      <!-- Kasus Seluruh Indonesia -->
      <div class="card" style="width: 36rem;">
        <div class="card-header">
          INDONESIA
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Terkonfirmasi: <?= $data['confirmed']?></li>
          <li class="list-group-item">Sembuh: <?= $data['recovered']?></li>
          <li class="list-group-item">Meninggal: <?= $data['deaths']?></li>
          <li class="list-group-item">Update Terakhir: <?= $data['lastUpdate']?></li>
        </ul>
      </div>
      <br><br>

      <!-- Kasus Per-Provinsi -->
      <div class="row">
      <?php for ($i=0; $i < count($data['prov']); $i++): ?>
        <div class="col-4 mb-5">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              <?= $data['prov'][$i]['key']; ?>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Terkonfirmasi: <?= $data['prov'][$i]['jumlah_kasus']; ?></li>
              <li class="list-group-item">Sembuh: <?= $data['prov'][$i]['jumlah_sembuh']; ?></li>
              <li class="list-group-item">Meninggal: <?= $data['prov'][$i]['jumlah_meninggal']; ?></li>
              <li class="list-group-item">Dirawat: <?= $data['prov'][$i]['jumlah_dirawat']; ?></li>
            </ul>
          </div>
        </div>
      <?php endfor; ?>
      </div>

      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>


</div>


