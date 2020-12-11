<div class="row mb-5">
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-header">Terkonfirmasi</div>
      <div class="card-body">
        <h1 class="card-title font-weight-bold"><?= number_format($covid_id['confirmed']['value']); ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-header">Sembuh</div>
      <div class="card-body">
        <h1 class="card-title font-weight-bold"><?= number_format($covid_id['recovered']['value']); ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-header">Meninggal</div>
      <div class="card-body">
        <h1 class="card-title font-weight-bold"><?= number_format($covid_id['deaths']['value']); ?></h1>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
      <div class="card-header">Update Terakhir</div>
      <div class="card-body">
        <h2 class="card-title font-weight-bold"><?= date('d M Y', strtotime($covid_id['lastUpdate'])) ?></h2>
      </div>
    </div>
  </div>
</div>