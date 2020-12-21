<style>
  .berita-home {
    position: relative;
    background-color: #000000;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: auto;
  }

  .berita-home::before {
    content: "";
    background-image: url('<?= $berita[0]['urlToImage']; ?>');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    opacity: 0.3;
  }
</style>


<div class="container" id="page" data-page="Home">
  <?= session()->getFlashdata('message') ?>

  <!-- DATA STATISTIK INDONESIA-->
  <div id="data-indonesia" align="left" class="jumbotron corner-round pt-5 mb-5 pb-5 home-content shadow color-light-font">
    <div class="row">
      <div class="col-sm-9 mt-2">
        <h1 class="color-light-font font-weight-bold font-42">CARI DATA SETIAP PROVINSI SECARA MUDAH DENGAN GOVINSY</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <p class="color-font-gray font-12">Govinsy hadir untuk memberikan anda informasi yang akurat dan terbaru dengan sumber yang terpercaya. Dengan Govinsy anda akan mendapatkan pengalaman berbeda dalam menjelajahi data statistic dengan design yang modern dan fitur yang dapat membantu anda dalam mencari data statistik.</p>
        <a href="<?= base_url(); ?>/statistik" class="btn btn-blue-opt corner-round mt-3">Jelajahi sekarang <i class="fas fa-walking"></i></a>
      </div>
    </div>
  </div>
  <!-- END DATA  STATISTIK Indonesia -->


  <!-- Sumber Data-->
  <div class="row">
    <div class="col-md-12 my-5">

      <h3 class="color-gray-font font-26 mb-4">SUMBER DATA YANG KAMI GUNAKAN</h3>

      <div class="row justify-content-between">

        <div class="col-lg-4 mb-4">
          <div class="card color-content text-center corner-round hover-card px-2">
            <div class="img-sumber mb-4">
              <img src="<?= base_url(); ?>/img/bps.png" class="mx-auto mt-5" width="40%" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title color-content-font font-weight-bold font-16">BADAN PUSAT STATISTIK</h5>
              <p class="font-12 color-gray-font">Badan Pusat Statistik merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus dan UU Nomor 7 Tahun 1960 tentang Statistik.</p>
              <a href="https://www.bps.g.id" class="color-blue-font">Lihat Website &rarr;</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card color-content text-center corner-round hover-card px-2">
            <div class="img-sumber p-4 position-relative mb-4">
              <img src="<?= base_url(); ?>/img/newsapi.png" class="mx-auto mt-5" width="50%" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title color-content-font font-weight-bold font-16">NEWS API</h5>
              <p class="font-12 color-gray-font">News Api merupakan layanan penyedia data berita dan artikel dari seluruh dunia.</p>
              <a href="https://www.bps.g.id" class="color-blue-font">Lihat Website &rarr;</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card color-content text-center corner-round hover-card px-2">
            <div class="img-sumber mb-4">
              <img src="<?= base_url(); ?>/img/gucov.png" class="mx-auto mt-5" width="35%" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title color-content-font font-weight-bold font-16">GUGUS TUGAS PERCEPATAN PENANGANAN COVID 19</h5>
              <p class="font-12 color-gray-font">Gugus Tugas Percepatan Penanganan COVID 19 adalah sebuah gugus tugas yang dibentuk pemerintah Indonesia untuk mengkoordinasikan kegiatan antarlembaga dalam upaya mencegah dan menanggulangi dampak penyakit koronavirus baru di Indonesia.</p>
              <a href="https://www.bps.g.id" class="color-blue-font">Lihat Website &rarr;</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- End Sumber Data-->



  <!-- COVID 19-->
  <div class="row justify-content-center">
    <div class="col-lg-12 my-5">

      <h3 class="color-gray-font font-26 mb-4">DATA COVID 19</h3>

      <div class="jumbotron justify-content-center color-content pt-4 mb-4 pb-2 shadow corner-round">

        <!-- Data COVID 19 -->
        <div class="row justify-content-center">
          <div class="col-lg-12">

            <p class="color-blue-font mb-4 text-left">DATA COVID 19 INDONESIA</p>
            <ul id="covid" class="color-content-font row justify-content-around pb-0 align-items-center">
              <li class="col-lg-4 mb-5 mt-1">
                <div class="mr-3 color-blue-bg cov-icon corner-round-10 float-left">
                  <i class="fas fa-fw color-light-font fa-user"></i>
                </div>
                <div class="pt-2">
                  <small class="text-gray-600 font-12 mr-1">POSITIF</small>
                  <?php if ($indo != false) :  ?>
                    <h1><?= str_replace(',', '.', number_format($indo['confirmed']['value'])) ?></h1>
                  <?php else : ?>
                    <h4>Belum Terdata</h4>
                  <?php endif; ?>

                </div>
              </li>
              <li class="col-lg-4 mb-5 mt-1">
                <div class="mr-3 color-green-bg cov-icon corner-round-10 float-left">
                  <i class="fas fa-fw color-light-font fa-syringe"></i>
                </div>
                <div class="pt-2">
                  <small class="text-gray-600 font-12 mr-1">SEMBUH</small>
                  <?php if ($indo != false) :  ?>
                    <h1><?= str_replace(',', '.', number_format($indo['recovered']['value'])) ?></h1>
                  <?php else : ?>
                    <h4>Belum Terdata</h4>
                  <?php endif; ?>
                </div>
              </li>
              <li class="col-lg-4 mb-5 mt-1">
                <div class="mr-3 color-red-bg cov-icon corner-round-10 float-left">
                  <i class="fas fa-fw color-light-font fa-skull"></i>
                </div>
                <div class="pt-2">
                  <small class="text-gray-600 font-12 mr-1">MENINGGAL</small>
                  <?php if ($indo != false) :  ?>
                    <h1><?= str_replace(',', '.', number_format($indo['deaths']['value'])) ?></h1>
                  <?php else : ?>
                    <h4>Belum Terdata</h4>
                  <?php endif; ?>
                </div>
              </li>
            </ul>

          </div>
        </div>
        <!-- Data COVID 19 End -->

      </div>

    </div>
  </div>
  <!-- End COVID 19 Indonesia -->

  <!-- COVID 19 Provinsi -->
  <div class="row justify-content-center">
    <div class="col-lg-12 mb-5">

      <div class="jumbotron justify-content-center color-content pt-4 mb-4 pb-2 shadow corner-round">
        <p class="color-blue-font mb-4 text-left">DATA COVID 19 PROVINSI</p>


        <!-- Hoverable map covid 19 -->

        <div class="row mb-5">
          <div class="col-lg-12 border-gray-1 pb-3 corner-round">

            <?php readfile(base_url() . '/img/map_indonesia.html');    ?>

            <div class="row">
              <div class="col-sm-3">
                <div class="circle-shape color-green-bg float-left"></div>
                <p class="color-content-font font-12 ml-4">
                  Kurang dari 5000 Kasus Positif
                </p>
              </div>
              <div class="col-sm-3">
                <div class="circle-shape color-yellow-bg float-left"></div>
                <p class="color-content-font font-12 ml-4">
                  5000-15.000 Kasus Positif
                </p>
              </div>
              <div class="col-sm-3">
                <div class="circle-shape color-red-bg float-left"></div>
                <p class="color-content-font font-12 ml-4">
                  Lebih dari 15.000 Kasus Positif
                </p>
              </div>
            </div>

            <!-- Deskripsi map covid 19 -->
            <div class="descriptions shadow">
              <?php foreach ($prov as $provinsi) : ?>
                <div class="map-prov <?= $provinsi['prov_id'] ?> <?php if ($provinsi['jumlah_kasus'] > 15000) echo "bahaya";
                                                                  elseif ($provinsi['jumlah_kasus'] < 15000 && $provinsi['jumlah_kasus'] > 5000) echo "peringatan";
                                                                  elseif ($provinsi['jumlah_kasus'] < 5000) echo "siaga";  ?> hilang">
                  <div class="row">
                    <div class="col-sm-12">

                      <img class="float-left size-20 mr-2" src="<?= base_url(); ?>/img/provinsi/logo/<?= $provinsi['prov_id'] ?>.png">
                      <p class="font-20 font-weight-bold color-content-font"><?= $provinsi['key'] ?></p>
                      <hr class="color-gray-bg">


                      <ul id="covid" class="color-content-font row pl-0 mb-0 justify-content-around">
                        <li class="col-4 mb-2 mt-1">
                          <div class="mr-2 color-blue-bg cov-icon-circle-small float-left">
                            <i class="fas fa-fw color-light-font fa-user"></i>
                          </div>
                          <div class="pt-0" style="margin-top:-7px">
                            <small class="text-gray-600 font-12">POSITIF</small>
                            <?php if ($provinsi != false) :  ?>
                              <p class="font-16 color-content-font font-weight-bold" style="margin-top:-15px"><?= str_replace(',', '.', number_format($provinsi['jumlah_kasus'])) ?></p>
                            <?php else : ?>
                              <h4>Belum Terdata</h4>
                            <?php endif; ?>

                          </div>
                        </li>
                        <li class="col-4 mb-2 mt-1">
                          <div class="mr-2 color-green-bg cov-icon-circle-small float-left">
                            <i class="fas fa-fw color-light-font fa-syringe"></i>
                          </div>
                          <div class="pt-0" style="margin-top:-7px">
                            <small class="text-gray-600 font-12">SEMBUH</small>
                            <?php if ($provinsi != false) :  ?>
                              <p class="font-16 color-content-font font-weight-bold" style="margin-top:-15px"><?= str_replace(',', '.', number_format($provinsi['jumlah_sembuh'])) ?></p>
                            <?php else : ?>
                              <h4>Belum Terdata</h4>
                            <?php endif; ?>
                          </div>
                        </li>
                        <li class="col-4 mb-2 mt-1">
                          <div class="mr-2 color-red-bg cov-icon-circle-small float-left">
                            <i class="fas fa-fw color-light-font fa-skull"></i>
                          </div>
                          <div class="pt-0" style="margin-top:-7px">
                            <small class="text-gray-600 font-12">MENINGGAL</small>
                            <?php if ($provinsi != false) :  ?>
                              <p class="font-16 color-content-font font-weight-bold" style="margin-top:-15px"><?= str_replace(',', '.', number_format($provinsi['jumlah_meninggal'])) ?></p>
                            <?php else : ?>
                              <h4>Belum Terdata</h4>
                            <?php endif; ?>
                          </div>
                        </li>
                      </ul>

                      <?php if ($provinsi['jumlah_kasus'] < 5000) :  ?>

                        <div class="circle-shape color-green-bg float-left"></div>
                        <p class="color-content-font font-12 ml-4">
                          Kurang dari 5000 Kasus Positif
                        </p>
                      <?php elseif ($provinsi['jumlah_kasus'] < 15000 && $provinsi['jumlah_kasus'] > 5000) : ?>

                        <div class="circle-shape color-yellow-bg float-left"></div>
                        <p class="color-content-font font-12 ml-4">
                          5000-15.000 Kasus Positif
                        </p>

                      <?php elseif ($provinsi['jumlah_kasus'] > 15000) : ?>

                        <div class="circle-shape color-red-bg float-left"></div>
                        <p class="color-content-font font-12 ml-4">
                          Lebih dari 15.000 Kasus Positif
                        </p>

                      <?php endif; ?>


                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
            <!-- Deskripsi map covid 19 End -->



          </div>
        </div>
        <!-- Hoverable map covid 19 End -->



        <!-- Data COVID 19 Provinsi-->
        <div class="row justify-content-center">
          <div class="col-md-12 pb-3">
            <table class="table table-hover" id="covid-prov">
              <thead class="border-none-top">
                <tr class="border-none-top text-gray-600">
                  <td scope="col">LOKASI</td>
                  <td scope="col">
                    <div class="mr-2 color-blue-bg cov-icon-circle-vsmall float-left">
                      <i class="fas fa-fw color-light-font fa-user"></i>
                    </div> POSITIF
                  </td>
                  <td scope="col">
                    <div class="mr-2 color-green-bg cov-icon-circle-vsmall float-left">
                      <i class="fas fa-fw color-light-font fa-syringe"></i>
                    </div> SEMBUH
                  </td>
                  <td scope="col">
                    <div class="mr-2 color-red-bg cov-icon-circle-vsmall float-left">
                      <i class="fas fa-fw color-light-font fa-skull"></i>
                    </div> MENINGGAL
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < count($prov); $i++) : ?>
                  <?php if ($i < 5) :  ?>
                    <tr>
                      <td class="color-content-font"><img class="size-16" src="<?php echo base_url() . "/img/provinsi/logo/" . $prov[$i]['prov_id'] ?>.png" alt=""> &ensp;<?= $prov[$i]['key'] ?></td>
                      <td class="color-blue-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_kasus'])) ?></td>
                      <td class="color-green-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_sembuh'])) ?></td>
                      <td class="color-red-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_meninggal'])) ?></td>
                    </tr>
                  <?php elseif ($i == 5) :  ?>
              </tbody>
              <tbody id="morle" class="hilang">
              <?php else :  ?>
                <tr>
                  <td class="color-content-font"><img class="size-16" src="<?php echo base_url() . "/img/provinsi/logo/" . $prov[$i]['prov_id'] ?>.png" alt=""> &ensp;<?= $prov[$i]['key'] ?></td>
                  <td class="color-blue-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_kasus'])) ?></td>
                  <td class="color-green-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_sembuh'])) ?></td>
                  <td class="color-red-font font-weight-bold"><?= str_replace(',', '.', number_format($prov[$i]['jumlah_meninggal'])) ?></td>
                </tr>
              <?php endif;  ?>
            <?php endfor; ?>
              </tbody>
            </table>
            <center><a id="more" class="color-blue-font pointer">Lihat Lebih Banyak</a></center>
          </div>
        </div>

        <!-- Data COVID 19 Provinsi End -->


      </div>


    </div>
  </div>
  <!-- END COVID 19 Provinsi -->



  <!-- Berita -->
  <div class="row">
    <div class="col-lg-12 mt-5">
      <h3 class="color-gray-font font-26 mb-4">BERITA TERBARU</h3>

      <div class="row">
        <div class="col-lg-12">
          <a href="<?= $berita[0]['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
            <div id="data-indonesia" align="left" class="jumbotron corner-round py-5 mb-5 berita-home hover-card shadow color-light-font">

              <div class="row">
                <div class="col-sm-9 mt-4">
                  <div class="bar-blue my-4"></div>
                  <h1 class="color-light-font font-weight-bold font-36"><?= $berita[0]['title']; ?></h1>
                  <p class="card-text"><small class="text-muted"><?= date('d/m/Y', strtotime($berita[0]['publishedAt'])); ?></small> - <small class="color-blue-font"><?= $berita[0]['source']['name'] ?></small> </p>
                </div>

              </div>
            </div>
          </a>

        </div>
      </div>


      <div class="row row-cols-1 row-cols-md-2">
        <?php if (isset($berita)) : ?>
          <?php for ($i = 1; $i < count($berita); $i++) : ?>
            <div class="col-lg-4 mb-4">
              <a href="<?= $berita[$i]['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                <div class="card color-content corner-round hover-card">
                  <img src="<?= $berita[$i]['urlToImage']; ?>" class="corner-round-top card-img-top" alt="...">
                  <div class="card-body">
                    <div class="bar-blue my-3"></div>
                    <h5 class="card-title color-content-font font-weight-bold"><?= $berita[$i]['title']; ?></h5>
                    <p class="card-text float-left"><small class="color-blue-font "><?= $berita[$i]['source']['name'] ?></small></p>
                    <p class="card-text float-right"><small class="text-muted"><?= date('d/m/Y', strtotime($berita[$i]['publishedAt'])); ?></small></p>
                  </div>
                </div>
              </a>
            </div>
          <?php endfor; ?>
        <?php else : ?>
          <div class="container">
            <p class="text-danger font-weight-bold">Gagal mengambil data Berita : periksa koneksi internet anda</p>
          </div>

        <?php endif; ?>
      </div>

    </div>
  </div>
  <!-- End Berita -->




</div>