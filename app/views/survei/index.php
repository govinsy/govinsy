<div class="container">
  <?php if ($data['ikutSurvei'] == 1) : ?>
    <div id="kesiapan" class="row justify-content-center text-center">
      <div class="col-md-10">
        <h3 class="color-light-font">Anda Sudah mengikuti survei</h3>
        <a href="<?= BASEURL; ?>/statistik">Lihat hasil statistik</a>
      </div>
    </div>
  <?php else : ?>

    <div id="kesiapan" class="row justify-content-center text-center">
      <div class="col-md-10">

        <div class="row">

          <div class="col-lg-12 mt-4 mb-5">
            <h2 class="color-light-font">Apakah anda sudah siap untuk mengikuti survei?</h2>
            <a href="<?= BASEURL; ?>/tentang/survei">Lihat selengkapnya tentang survei</a>
          </div>
        </div>

        <div class="row justify-content-around text-center">
          <div class="col-lg-5 mb-3">
            <button id="sudah-siap" class="btn btn-green corner-round font-26">Sudah Siap <i class="fas fa-arrow-right"></i></button>
            <p class="text-gray-600 small mt-2">Bila sudah siap klik tombol di atas ini</p>
          </div>
        </div>

      </div>

    </div>

    <div id="survei-proses" class="row justify-content-center hilang mb-3">
      <div class="col-lg-8">

        <div class="jumbotron mt-3 color-none-bg  text-center mb-3 py-1">
          <ul id="indikator-pertanyaan">
          </ul>
        </div>

        <div class="jumbotron mt-4 color-content py-4" id="survei-pertanyaan">
          <form method="post" action="<?= BASEURL; ?>/survei">
            <!-- Menampilkan seluruh pertanyaan -->
            <?php if (isset($data['pertanyaan'])) : ?>
              <?php $i = 0;
              foreach ($data['pertanyaan'] as $p) : $i++ ?>
                <ul id="P<?= $i; ?>" class="list-group hilang">
                  <p class="font-16 text-gray-600 mb-0">PERTANYAAN <?= $i ?></p>
                  <p class="font-26 link-not-active mb-5"><?= $p['pertanyaan'] ?></p>

                  <?php  /*Menampilkan seluruh jawaban*/ foreach ($data['jawaban'] as $j) : ?>

                    <?php /*Mencari data jawaban yang sesuai dengan pertanyaan*/ if ($j['id_pertanyaan'] == $p['id']) : ?>

                      <label for="<?= $j['id'] ?>">
                        <li id="J-<?= $j['id'] ?>" class="list-group-item mb-3 rounded">
                          <div class="form-check">


                            <input class="form-check-input hilang" type="radio" name="<?= $p['id'] ?>" id="<?= $j['id'] ?>" value="<?= $j['id'] ?>" onChange="autoSubmit()">
                            <label class="form-check-label" for="<?= $j['id'] ?>"><?= $j['jawaban']; ?></label>
                          </div>
                        </li>
                      </label>
                    <?php endif ?>
                  <?php endforeach ?>

                </ul>


              <?php endforeach ?>
            <?php else : ?>
              <div class="container">
                <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi database</p>
              </div>
            <?php endif ?>

        </div>
        <div class="row justify-content-between text-center">
          <div class="col-4 text-left">
            <button type="button" id="kembali" class="btn btn-outline-blue hilang corner-round px-4"><i class="fas fa-fw fa-arrow-left"></i> Sebelumnya</button>
          </div>
          <div class="col-4 text-right">
            <button type="button" id="lanjut" class="btn btn-outline-blue corner-round px-4">Selanjutnya <i class="fas fa-fw fa-arrow-right"></i></button>
            <button type="submit" id="selesai" class="btn hilang btn-blue corner-round px-4">Selesai <i class="fas fa-fw fa-check"></i></button>
          </div>

        </div>

        </form>

      </div>

    </div>

    <?php Flasher::flash(); ?>
  <?php endif; ?>



</div>