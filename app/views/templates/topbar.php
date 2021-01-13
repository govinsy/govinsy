<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Modal Masuk -->
    <div class="modal bd-example-modal-lg fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content corner-round">

                <div class="card corner-round o-hidden color-content border-0 shadow-lg">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="color-blue-font font-weight-bold mb-5 mr-5">Masuk</h4>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="<?= base_url(); ?>/pengguna/daftar" class="btn py-0 corner-round btn-outline-blue ml-5">Daftar</a>
                                        </div>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url(); ?>/pengguna/login">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-inp corner-round" id="exampleInputEmail" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <div class="password position-relative">
                                                <i id="togglePassword" class="fas fa-eye color-gray-font position-absolute pointer click-opacity" style="right:0;margin:12px 20px 0 0;"></i>
                                                <input name="password" type="password" class="form-control form-inp corner-round" id="exampleInputPassword" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                                        </div>
                                        <hr>
                                        <button type="submit" name="login" class="btn btn-blue btn-block corner-round">
                                            <i class="fas fa-sign-in-alt"></i> Masuk
                                        </button>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Register with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                    </a> -->
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Modal Masuk -->


    <!-- Main Content -->
    <div id="content" class="color-bg pb-5">

        <div id="topbar" class="position-sticky sticky-top">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST">


                    <div class="input-group color-content">
                        <input type="text" id=<?= ($page === "Berita") ? "'cariBerita' placeholder='Cari Berita' " : "'cariProv' placeholder='Cari Provinsi'" ?> data-url="<?= base_url() ?>" class="form-control color-content color-content-font border-0 small" aria-label="Search" aria-describedby="basic-addon2" name="cari" style="z-index:10">
                        <div class="input-group-append">

                            <button class="btn <?= ($page === "Berita") ? "color-blue-bg" : "color-content" ?>" <?= ($page === "Berita") ? "type='submit'" : "type='button'" ?> data-url="<?= base_url() ?>">
                                <i class="fas fa-search fa-sm color-content-font"></i>
                            </button>
                        </div>

                        <ul class="position-absolute mt-4 list-none color-content cariProv pt-3 pl-0 hilang shadow" id="dataProv" style="left:0;"> </ul>
                    </div>


                </form>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu color-content shadow dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search" method="POST">
                                <div class="input-group">
                                    <input type="text" id="cariProvMob" data-url="<?= base_url() ?>" class="form-control color-content color-content-font border-0 small" placeholder="Cari Provinsi " aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                    <ul class="position-relative mt-4 list-none color-content cariProv pt-0 pl-0 hilang" id="dataProvMob"> </ul>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - User Information -->
                    <?php if (isset($_SESSION['login'])) : ?>
                        <li class="nav-item dropdown no-arrow pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="text-right mt-2 my-auto">
                                    <?php if (isset($_SESSION['profile'])) : ?>
                                        <small class="mr-2 d-none d-lg-inline color-content-font"><?= str_replace(' ', '', $_SESSION['profile']['nama']); ?></small><br>
                                    <?php endif; ?>
                                    <small class="mr-2 d-none d-lg-inline text-gray-600 font-10"><i class="fas fa-map-marked"></i> Jawa Tengah</small>
                                </div>
                                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/profile/<?= $_SESSION['profile']['gambar']  ?>">
                            </a>



                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right color-content-font shadow color-content animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item color-content-font d-block" href="<?= base_url(); ?>/pengguna/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item color-content-font d-block" href="<?= base_url(); ?>/pengguna/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="container">

                                    <div id="tema-toggle" class="row position-relative text-center justify-content-center mt-3">
                                        <div class="col-2">
                                        </div>
                                        <i style="margin-left:-5px;" class="fas fa-moon font-20"></i>
                                        <div class="col-6 text-center">
                                            <div style="margin-left:-6px;" class="switch pointer" data-url="<?= base_url(); ?>" data-uid="<?= $_SESSION['profile']['id'] ?>" data-now="<?= $_SERVER['REQUEST_URI']; ?>" data-tema="<?= $_SESSION['profile']['tema'] ?>" <?php if (isset($_SESSION['profile']['tema'])) {
                                                                                                                                                                                                                                                                            if ($_SESSION['profile']['tema'] == 1) {
                                                                                                                                                                                                                                                                                echo "id='activeFirst'";
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                        } ?>></div>
                                        </div>
                                        <div class="col-2 text-left">
                                            <i style="margin-left:-16px;text-align:left;" class="fas fa-sun font-20"></i>
                                        </div>
                                    </div>


                                </div>



                            </div>

                        </li>
                    <?php else : ?>
                        <li class="nav-item px-2 my-auto">
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-blue corner-round"><i class="fas fa-sign-in-alt"></i> Masuk</button>
                        </li>
                    <?php endif; ?>

                </ul>

            </nav>
            <!-- End of Topbar -->
        </div>