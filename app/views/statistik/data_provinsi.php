<div class="container-fluid">


    <!--  Data Provinsi -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div align="center" class="jumbotron color-content color-content text-align-center mb-4">
                <img src="<?php echo base_url() . "/img/provinsi/logo/" . $_GET['domain_id'] . ".png"; ?>" width="20%">
                <h2 class="mt-3 color-light-font font-weight-bold">Provinsi <?= $_GET['nama_provinsi'] ?></h2>
                <small class="text-gray-600">IBU KOTA</small>
                <h6 class="color-light-font"><?= $provdesc['ibu_kota'] ?></h6>
                <a href="https://www.google.com/maps/place/<?php echo "" . str_replace(" ", "+", $_GET['nama_provinsi']) ?>" target="_blank" rel="noopener noreferrer">Lihat peta</a>
            </div>
        </div>
    </div>
    <!--  Data Provinsi End -->



    <!-- COVID 19-->
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="jumbotron justify-content-center color-content mb-4 pb-2">

                <!-- Data COVID 19 -->
                <div class="row justify-content-center" id="covid19">
                    <div class="col-lg-12">

                        <p class="color-light-font mb-4 text-center justify-content-center">DATA COVID 19 PROVINSI <?= $covid['key'] ?></p>
                        <ul id="covid" class="color-light-font row justify-content-around pb-0 align-items-center">
                            <li class="col-lg-4 mb-5 mt-1">
                                <div class="mr-3 color-blue-bg cov-icon corner-round-10 float-left">
                                    <i class="fas fa-fw fa-user"></i>
                                </div>
                                <div class="pt-2">
                                    <small class="text-gray-600 mr-1 float-left">POSITIF</small>
                                    <p class="small color-blue-font mb-0"><?= '+' . number_format($covid['penambahan']['positif']) ?></p>

                                    <?php if ($covid != false) :  ?>
                                        <h1><?= number_format($covid['jumlah_kasus']) ?></h1>
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
                                    <p class="small color-green-font mb-0"><?= '+' . number_format($covid['penambahan']['sembuh']) ?></p>
                                    <?php if ($covid != false) :  ?>
                                        <h1><?= number_format($covid['jumlah_sembuh']) ?></h1>
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
                                    <p class="small color-red-font mb-0"><?= '+' . number_format($covid['penambahan']['meninggal']) ?></p>
                                    <?php if ($covid != false) :  ?>
                                        <h1><?= number_format($covid['jumlah_meninggal']) ?></h1>
                                    <?php else : ?>
                                        <h4>Belum Terdata</h4>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Data COVID 19 End -->


                <!-- RS Rujukan -->
                <div class="row mb-3" id="rumah-sakit">
                    <div class="col-12">
                        <p class="mt-3 color-light-font mb-4 text-center justify-content-center">DAFTAR RUMAH SAKIT DI PROVINSI <?= $covid['key'] ?></p>
                        <div class="card color-content border-0">
                            <div class="card-body row justify-content-center">

                                <div class="col-md-12 slide-wrapper">
                                    <ul class="slide" id="nomor-slide">
                                        <?php if (isset($hospital)) : ?>
                                            <?php foreach ($hospital as $h) : ?>
                                                <?php if (stristr($_GET['nama_provinsi'], $h['province'])) : ?>

                                                    <li class="color-bg">
                                                        <div class="list-group list-group-flush border-0">
                                                            <div class="list-group-item border-0 list-group-item-action list-group-item-primary color-blue-bg"><small class="font-weight-bold"><?= $h['name']; ?></small></div>
                                                            <div class="list-group-item border-0 color-bg"><i class="fas fa-map-marked color-blue-font"> </i> <small class="color-light-font"><?= $h['region']; ?></small></div>
                                                            <div class="list-group-item border-0 color-bg"><i class="fas fa-map-marked color-blue-font"></i> <small class="color-light-font"><?= $h['address']; ?></small></div>
                                                            <div class="list-group-item border-0 color-bg"><i class="fas fa-phone color-blue-font"></i> <?php if ($h['phone'] != null) : ?> <small class="color-light-font"><?= $h['phone']; ?></small> <?php else : ?> <small class="color-light-font">Tidak ada nomor</small> <?php endif; ?></div>
                                                        </div>
                                                    </li>

                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <div class="container">
                                                <p class="text-danger font-weight-bold">Gagal mengambil data: periksa koneksi internet</p>
                                            </div>
                                        <?php endif ?>

                                    </ul>
                                </div>

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
                </div>
                <!-- RS Rujukan End -->

            </div>

        </div>
    </div>
    <!-- COVID 19 End -->





    <!-- Ekonomi -->
    <div class="row" id="ekonomi">
        <div class="col-lg-12 mb-5">

            <div style="border:none;" class="card shadow color-content mt-4">
                <div class="card-header py-3 color-blue-bg">
                    <h6 class="m-0 font-weight-bold ">Ekonomi</h6>
                </div>
                <div class="card-body color-light-font mt-3">
                    <div class="row justify-content-center">

                        <div class="col-md-4 color-content mb-3 text-center card border-0" style="width: 18rem;">
                            <div class="card-body rounded color-bg">
                                <img class="mt-3" src="<?= base_url(); ?>/img/bank.png" width="35%" alt="">
                                <p class="text-gray-600 font-16 mt-3" data-html="true" data-toggle="popover" data-trigger="hover" data-content="<b>APBD</b> <p class='color-red-font font-12'>Anggaran Pendapatan dan Belanja Daerah, adalah rencana keuangan tahunan pemerintah daerah di Indonesia yang disetujui oleh Dewan Perwakilan Rakyat Daerah.</p>">APBD</p>
                                <h2 class="font-weight-bold"><?= $provdesc['apbd'] ?></h2>
                                <p class="font-10">Miliar rupiah</p>
                            </div>
                        </div>

                        <div class="col-md-4 color-content mb-3 text-center card border-0" style="width: 18rem;">
                            <div class="card-body rounded color-bg">
                                <img class="mt-3" src="<?= base_url(); ?>/img/coin.png" width="35%" alt="">
                                <p class="text-gray-600 font-16 mt-3" title="PRDB" data-toggle="popover" data-trigger="hover" data-content="Anggaran Pendapatan dan Belanja Daerah, adalah rencana keuangan tahunan pemerintah daerah di Indonesia yang disetujui oleh Dewan Perwakilan Rakyat Daerah.Produk domestik regional bruto adalah jumlah nilai tambah bruto yang timbul dari seluruh sektor perekonomian di daerah tersebut.">PRDB</p>
                                <h2 class="font-weight-bold"><?= $provdesc['populasi'] ?></h2>
                                <p class="font-10">Triliun rupiah</p>
                            </div>
                        </div>

                        <div class="col-md-4 color-content mb-3 text-center card border-0" style="width: 18rem;">
                            <div class="card-body rounded color-bg">
                                <img class="mt-3" src="<?= base_url(); ?>/img/invest.png" width="35%" alt="">
                                <p class="text-gray-600 font-16 mt-3">PRDB PER KAPITA</p>
                                <h2 class="font-weight-bold"><?= $provdesc['prdb_per_kapita'] ?></h2>
                                <p class="font-10">Juta rupiah</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Ekonomi End-->






    <!-- Kependudukan -->
    <div class="row">

        <!-- Geografi -->
        <div class="col-lg-6" id="geografi">

            <div style="border:none;" class="card shadow color-content mb-4">
                <div class="card-header py-3 color-blue-bg">
                    <h6 class="m-0 font-weight-bold ">Geografi</h6>
                </div>
                <div class="card-body color-light-font mt-3 position-relative">
                    <div class="row justify-content-center">
                        <div class="peta col-sm-6">
                            <img class="ml-3" src="<?php echo base_url() . "/img/provinsi/peta/" . $_GET['domain_id'] . ".svg"; ?>" width="90%" alt="">
                        </div>
                        <div class="info-wilayah pl-4 col-sm-6">
                            <small class="text-gray-600">LUAS WILAYAH</small>
                            <h5><?= $provdesc['luas_total'] ?>
                                <small style="font-size:1rem;"><sub>KM <sup>2</sup></sub></small>
                            </h5>
                            <small class="text-gray-600 mt-5">JUMLAH PENDUDUK</small>
                            <h5><?= $provdesc['populasi'] ?>
                                <small style=" font-size:1rem;"><sub>Jiwa</sub></small>
                            </h5>
                            <small class="text-gray-600 mt-5">KEPADATAN PENDUDUK</small>
                            <h5><?= $provdesc['populasi_per_luas'] ?>
                                <small style=" font-size:1rem;"><sub>Jiwa/KM <sup>2</sup></sub></small>
                            </h5>
                            <small class="text-gray-600 mt-5">PULAU</small>
                            <h5><?= $provdesc['pulau'] ?></h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Geografi End-->


        <!-- Sosial -->
        <div class="col-lg-6" id="sosial">

            <div style="border:none;" class="card shadow color-content mb-4">
                <div class="card-header py-3 color-blue-bg">
                    <h6 class="m-0 font-weight-bold ">Sosial</h6>
                </div>
                <div class="card-body color-light-font mt-4">
                    <h4 class="small font-weight">PRESENTASE PENDUDUK MISKIN <span class="float-right color-red-font"><?php echo ($stat['penduduk_miskin']['value'] != null) ? $stat['penduduk_miskin']['value'] . "%" : "Belum Terdata" ?></span></h4>
                    <div class="progress color-bg mb-4" style="height:25px">
                        <div class="progress-bar color-red-bg" role="progressbar" style="width: <?= $stat['penduduk_miskin']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight">TINGKAT PENGANGGURAN<span class="color-blue-font float-right"><?php echo ($stat['pengangguran']['value'] != null) ? $stat['pengangguran']['value'] . "%" : "Belum Terdata" ?></span></h4>
                    <div class="progress color-bg mb-4" style="height:25px">
                        <div class="progress-bar" role="progressbar" style="width: <?= $stat['pengangguran']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight" title="Indeks Pembangunan Manusia" data-toggle="popover" data-trigger="hover" data-content="Indeks Pembangunan Manusia atau Human Development Index adalah pengukuran perbandingan dari harapan hidup, melek huruf, pendidikan dan standar hidup.">INDEK PEMBANGUNAN MANUSIA<span class="color-green-font float-right"><?= $provdesc['ipm'] ?>%</span></h4>
                    <div class="progress color-bg mb-4" style="height:25px">
                        <div class="progress-bar color-green-bg" role="progressbar" style="width: <?= intval($provdesc['ipm']) ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Sosial End-->

    </div>
    <!-- Kependudukan End  -->


</div>