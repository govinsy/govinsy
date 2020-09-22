<div class="container">
  <div class="jumbotron mt-4">
    <h1 class="display-4">Survei Govinsy</h1>
    <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
  </div>

  <?php Flasher::flash(); ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form method="post" action="<?= BASEURL; ?>/survei">
          <div class="row">

              <!-- Menampilkan seluruh pertanyaan -->
              <?php if(isset($data['pertanyaan'])): ?>
              <?php foreach($data['pertanyaan'] as $p): ?>

              <div class="col-md-4 mb-3">
                <ul class="list-group">
                  <li class="list-group-item list-group-item-primary font-weight-bold"><?= $p['pertanyaan'] ?></li>

                  <!-- Menampilkan seluruh jawaban -->
                  <?php foreach($data['jawaban'] as $j): ?>

                  <!-- Mencari data jawaban yang sesuai dengan pertanyaan -->
                  <?php if($j['id_pertanyaan'] == $p['id']): ?>

                  <li class="list-group-item">
                    <div class="form-check">

                      <!-- Key = id(pertanyaan) value = id(jawaban) -->
                      <input class="form-check-input" type="radio" name="<?= $p['id'] ?>" id="<?= $j['id'] ?>"
                        value="<?= $j['id'] ?>" onChange="autoSubmit()">
                      <label class="form-check-label" for="<?= $j['id'] ?>">
                        <?= $j['jawaban']; ?>
                      </label>
                    </div>
                  </li>
                  <?php endif ?>
                  <?php endforeach ?>

                </ul>
              </div>

              <?php endforeach ?>
              <?php else: ?>
                <div class="container">
                  <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi database</p>
                </div>
              <?php endif ?>

            </div>
            <input type="submit" value="submit" class="btn btn-primary mt-3">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>