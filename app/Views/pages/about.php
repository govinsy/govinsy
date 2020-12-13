<?= $this->extend('templates/base') ?>
<?= $this->section('content') ?>
<div class="container">

    <!--  Data Pengunjung & User -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div align="center" class="jumbotron color-content text-align-center mb-4">

                <div class="card-deck">

                    <div class="card border-0 rounded">
                        <div class="card-body color-bg rounded text-center">
                            <h1 class="card-title color-blue-font"><?= $visitor ?></h1>
                            <p class="card-text font-10 color-light-font">PENGUNJUNG WEBSITE</p>
                        </div>
                    </div>

                    <div class="card border-0 rounded">
                        <div class="card-body color-bg rounded text-center">
                            <h1 class="card-title color-blue-font"><?= $visitor ?></h1>
                            <p class="card-text font-10 color-light-font">PENGUNJUNG WEBSITE</p>
                        </div>
                    </div>

                    <div class="card border-0 rounded">
                        <div class="card-body color-bg rounded text-center">
                            <h1 class="card-title color-blue-font"><?= $visitor ?></h1>
                            <p class="card-text font-10 color-light-font">PENGUNJUNG WEBSITE</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- End Data Pengunjung & User -->


    <div class="row justify-content-center text-center">
        <div class="col-lg-7 mb-4 color-light-font">
            <h2 class="mt-3 font-42 font-weight-bold">Tim Kami</h2>
            <p class="font-16 text-gray-700">Kami bekerja kreatif dengan melibatkan pengujian kegunaan untuk membuat aplikasi yang berguna untuk semua orang</p>
        </div>
    </div>

    <div class="row justify-content-end">

        <div class="col-lg-3 mb-4">
            <div class="card text-center py-1 pt-4 color-content color-light-font">
                <img class="card-img-top mx-auto rounded-circle" style="width:7rem;" src="<?= base_url(); ?>/img/profile/default.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-26 font-weight-bold mb-0">Ahmad N</h5>
                    <small class="font-10 text-gray-600">Lead Back-End & System Analyst</small>
                    <p class="card-text font-12 mt-1">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <ul class="list-inline color-blue-font social-buttons text-center mb-0 mt-4">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-3 mb-4">
            <div class="card text-center py-1 pt-4 color-content color-light-font">
                <img class="card-img-top mx-auto rounded-circle" style="width:7rem;" src="<?= base_url(); ?>/img/profile/default.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-26 font-weight-bold mb-0">Bima S</h5>
                    <small class="font-10 text-gray-600">Lead Front-End & Lead UI/UX</small>
                    <p class="card-text font-12 mt-1">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <ul class="list-inline color-blue-font social-buttons text-center mb-0 mt-4">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-3 mb-4">
            <div class="card text-center py-1 pt-4 color-content color-light-font">
                <img class="card-img-top mx-auto rounded-circle" style="width:7rem;" src="<?= base_url(); ?>/img/profile/default.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-26 font-weight-bold mb-0">Irgi A</h5>
                    <small class="font-10 text-gray-600">Front-End + Assets</small>
                    <p class="card-text font-12 mt-1">This card has supporting text below as a natural lead-in to additional content.</p>
                    <ul class="list-inline color-blue-font social-buttons text-center mb-0 mt-4">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/grosir.masker.140" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.github.com" target="_blank"><i class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-4">
            <div class="card text-center py-1 pt-4 color-content color-light-font">
                <img class="card-img-top mx-auto rounded-circle" style="width:7rem;" src="<?= base_url(); ?>/img/profile/default.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-26 font-weight-bold mb-0">Tegar S</h5>
                    <small class="font-10 text-gray-600">Front-End + Assets</small>
                    <p class="card-text font-12 mt-1">This is a wider card with srd has even longer content than the first to show that equal height action.</p>
                    <ul class="list-inline color-blue-font social-buttons text-center mb-0 mt-4">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/rexushello123" target="_blank"><i class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>