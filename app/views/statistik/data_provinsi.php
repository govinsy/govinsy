<div class="container-fluid">


    <!--  Data Provinsi -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div align="center" class="jumbotron color-content color-content text-align-center mb-4">
                <h2 class="mt-0 color-light-font"><?= $_GET['nama_provinsi'] ?></h2>
                <p class="small color-light-font">LUAS WILAYAH</p>
                <small class="color-light-font">12000 KM<sup>2</sup></small>
                <a href="https://www.maps.com">Lihat peta</a>
            </div>
        </div>
    </div>
    <!--  Data Provinsi End -->



    <!-- Data COVID 19-->
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="jumbotron color-content mb-4 pb-2">
                <div class="row mb-4 justify-content-center">
                    <p class="color-light-font">DATA COVID 19 PROVINSI <?= $data['covid']['key'] ?></p>
                </div>
                <ul id="covid" class="color-light-font row justify-content-around pb-0 align-items-center">
                    <li class="col-lg-4 mb-5 mt-1">
                        <div class="mr-3 color-blue-bg cov-icon corner-round-10 float-left">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <div class="pt-2">
                            <small class="text-gray-600 mr-1 float-left">POSITIF</small>
                            <p class="small color-blue-font mb-0"><?= '+' . $data['covid']['penambahan']['positif'] ?></p>
                            <?php if ($data['covid'] != false) :  ?>
                                <h1><?= $data['covid']['jumlah_kasus'] ?></h1>
                            <?php else : ?>
                                <h4>Belum Terdata</h4>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="col-lg-4 mb-5 mt-1">
                        <div class="mr-3 color-green-bg cov-icon corner-round-10 float-left">
                            <i class="fas fa-fw fa-syringe"></i>
                        </div>
                        <div class="pt-2">
                            <small class="text-gray-600 mr-1 float-left">SEMBUH</small>
                            <p class="small color-green-font mb-0"><?= '+' . $data['covid']['penambahan']['sembuh'] ?></p>
                            <?php if ($data['covid'] != false) :  ?>
                                <h1><?= $data['covid']['jumlah_sembuh'] ?></h1>
                            <?php else : ?>
                                <h4>Belum Terdata</h4>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="col-lg-4 mb-5 mt-1">
                        <div class="mr-3 color-red-bg cov-icon corner-round-10 float-left">
                            <i class="fas fa-fw fa-skull"></i>
                        </div>
                        <div class="pt-2">
                            <small class="text-gray-600 mr-1 float-left">MENINGGAL</small>
                            <p class="small color-red-font mb-0"><?= '+' . $data['covid']['penambahan']['meninggal'] ?></p>
                            <?php if ($data['covid'] != false) :  ?>
                                <h1><?= $data['covid']['jumlah_meninggal'] ?></h1>
                            <?php else : ?>
                                <h4>Belum Terdata</h4>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>
    <!-- Data COVID 19 End -->



    <!-- Kependudukan -->
    <div class="row">

        <!-- Pie Chart -->
        <div class="col-lg-5">

            <!-- Card Body -->
            <div class="card color-content shadow mb-4">
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas wanita="<?= $data['covid']['jenis_kelamin'][1]['doc_count'] ?>" semua="<?= $data['covid']['jumlah_sembuh']  ?>" pria="<?= $data['covid']['jenis_kelamin'][0]['doc_count'] ?>" id="myPieChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        <!-- Chart Pie End-->


        <!-- Progress Card -->
        <div class="col-lg-7">

            <div style="border:none;" class="card shadow color-content mb-4">
                <div class="card-header py-3 color-blue-bg">
                    <h6 class="m-0 font-weight-bold ">Sosial</h6>
                </div>
                <div class="card-body color-light-font mt-3">
                    <h4 class="small font-weight">PRESENTASE PENDUDUK MISKIN <span class="float-right color-red-font"><?php echo ($data['stat']['penduduk_miskin']['value'] != null) ? $data['stat']['penduduk_miskin']['value'] . "%" : "Belum Terdata" ?></span></h4>
                    <div class="progress color-bg mb-5" style="height:25px">
                        <div class="progress-bar color-red-bg" role="progressbar" style="width: <?= $data['stat']['penduduk_miskin']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight">TINGKAT PENGANGGURAN<span class="color-blue-font float-right"><?php echo ($data['stat']['pengangguran']['value'] != null) ? $data['stat']['pengangguran']['value'] . "%" : "Belum Terdata" ?></span></h4>
                    <div class="progress color-bg mb-4" style="height:25px">
                        <div class="progress-bar" role="progressbar" style="width: <?= $data['stat']['pengangguran']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Progress Card End-->

    </div>
    <!-- Kependudukan End  -->



    <!-- Ekonomi Chart -->
    <div class="row justify-content-center">
        <div id="carouselExampleIndicators" data-ride="carousel" class="col-lg-12 carousel slide">

            <div class="card color-content shadow pb-5">
                <div class="card-header color-blue-bg py-3">
                    <h6 class="m-0 font-weight-bold color-font">Ekonomi</h6>
                </div>
                <div class="card-body carousel-inner pt-3">
                    <div class="carousel-item active">
                        <h4 align="center" class="color-light-font my-3">Inflasi</h4>
                        <div class="chart-area pb-4">
                            <canvas id="chart-inflasi"></canvas>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <h4 align="center" class="color-light-font my-3">Impor</h4>
                        <div class="chart-area pb-4">
                            <canvas id="chart-impor"></canvas>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <h4 align="center" class="color-light-font my-3">Ekspor</h4>
                        <div class="chart-area pb-4">
                            <canvas id="chart-ekspor"></canvas>
                        </div>
                    </div>
                </div>

                <ol class="carousel-indicators mb-4">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
            </div>

        </div>
    </div>
    <!-- Ekonomi Chart End -->






</div>

<?php

var_dump($data['covid']);
var_dump($data['stat']);
