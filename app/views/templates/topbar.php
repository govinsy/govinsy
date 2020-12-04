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


                <?php if ($page === "Statistik" || $page === "Berita") : ?>
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control color-content border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn color-blue-bg" type="button">
                                    <i class="fas fa-search fa-sm color-light-font"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="topbar-divider d-none d-sm-block"></div>
                    </li>
                    <!-- Nav Item - User Information -->
                    <?php if (isset($_SESSION['login'])) : ?>
                        <li class="nav-item dropdown no-arrow pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="text-right mt-2 my-auto">
                                    <?php if (isset($_SESSION['profile'])) : ?>
                                        <small class="mr-2 d-none d-lg-inline text-white-600l"><?= str_replace(' ', '', $_SESSION['profile']['nama']); ?></small><br>
                                    <?php endif; ?>
                                    <small class="mr-2 d-none d-lg-inline text-gray-600 font-10"><i class="fas fa-map-marked"></i> Jawa Tengah</small>
                                </div>
                                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/profile/<?= $_SESSION['profile']['gambar']  ?>">
                            </a>



                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow color-content animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item color-light-font d-block" href="<?= base_url(); ?>/pengguna/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item color-light-font d-block" href="<?= base_url(); ?>/pengguna/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
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