<div class="container">

  <!-- Cek apakah user sudah mengikuti survei -->
  <?php if ($ikutSurvei == 1) : ?>


    <div id="kesiapan" class="row justify-content-center text-center">
      <div class="col-md-10">
        <h3 class="color-content-font">Anda Sudah mengikuti survei</h3>
      </div>
    </div>


    <!-- SURVEI -->
    <div class="row">
      <div class="col-12">
        <div id="data-provinsi" align="center" class="jumbotron shadow color-content pt-5 slide-wrapper">


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


  <?php else : ?>

    <!-- Persiapan user -->
    <div id="kesiapan" class="row justify-content-center text-center">
      <div class="col-md-10 my-auto">

        <div class="row">

          <div class="col-lg-12 mt-4 mb-5">
            <h2 class="color-content-font">Apakah anda sudah siap untuk mengikuti survei?</h2>
            <a href="<?= base_url(); ?>/tentang/survei">Lihat selengkapnya tentang survei</a>
          </div>
        </div>

        <div class="row justify-content-around text-center">
          <div class="col-lg-12 mb-3">
            <button id="sudah-siap" class="btn btn-green corner-round font-26">Sudah Siap <i class="fas fa-arrow-right"></i></button>
            <p class="text-gray-600 small mt-2">Bila sudah siap klik tombol di atas ini</p>
          </div>
        </div>

      </div>
    </div>
    <!-- End persiapan user -->

    <!-- Survei -->
    <div id="survei-proses" class="row justify-content-center hilang mb-3">
      <div class="col-lg-8">

        <!-- Indikator Pertanyaan Survei -->
        <div class="jumbotron mt-3 color-none-bg  text-center mb-3 py-1">
          <ul id="indikator-pertanyaan">
          </ul>
        </div>
        <!-- End Indikator Pertanyaan Survei -->

        <div class="jumbotron mt-4 color-content py-4" id="survei-pertanyaan">
          <form method="post" action="<?= base_url(); ?>/survei">
            <?= csrf_field(); ?>
            <!-- Menampilkan seluruh pertanyaan -->
            <?php if (isset($pertanyaan)) : ?>
              <?php $i = 0;
              foreach ($pertanyaan as $p) : $i++ ?>
                <ul id="P<?= $i; ?>" class="list-group hilang">
                  <p class="font-16 text-gray-600 mb-0">PERTANYAAN <?= $i ?></p>
                  <p class="font-26 color-content-font mb-5"><?= $p['pertanyaan'] ?></p>

                  <?php  /*Menampilkan seluruh jawaban*/ foreach ($jawaban as $j) : ?>

                    <?php /*Mencari data jawaban yang sesuai dengan pertanyaan*/ if ($j['id_pertanyaan'] == $p['id']) : ?>

                      <label for="<?= $j['id'] ?>">
                        <li id="J-<?= $j['id'] ?>" class="list-group-item mb-3  rounded">
                          <div class="form-check">
                            <input class="form-check-input hilang" type="radio" name="<?= $p['id'] ?>" id="<?= $j['id'] ?>" value="<?= $j['id'] ?>" onChange="autoSubmit()">
                            <label class="form-check-label" for="<?= $j['id'] ?>"><?= $j['jawaban']; ?></label>
                          </div>
                        </li>
                      </label>
                    <?php endif; ?>
                  <?php endforeach; ?>

                </ul>


              <?php endforeach; ?>
            <?php else : ?>
              <div class="container">
                <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi database</p>
              </div>
            <?php endif ?>

        </div>

        <!-- Button control survei -->
        <div class="row justify-content-between text-center">
          <div class="col-4 text-left">
            <button type="button" id="kembali" class="btn btn-outline-blue hilang corner-round px-4"><i class="fas fa-fw fa-arrow-left"></i> Sebelumnya</button>
          </div>
          <div class="col-4 text-right">
            <button type="button" id="lanjut" class="btn btn-outline-blue corner-round px-4">Selanjutnya <i class="fas fa-fw fa-arrow-right"></i></button>
            <button type="submit" id="selesai" class="btn hilang btn-blue corner-round px-4">Selesai <i class="fas fa-fw fa-check"></i></button>
          </div>
        </div>
        <!-- End Button control survei -->

        </form>

      </div>
    </div>
    <!-- End Survei -->

    <?php //Flasher::flash(); 
    ?>
  <?php endif; ?>



</div>