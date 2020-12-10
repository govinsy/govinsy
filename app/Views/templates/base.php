<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!---   Css Assets    -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/sb-admin-2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/pace-theme-minimal.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/fontawsome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/slider.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/image-cropper/dropzone.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/image-cropper/cropper.css">
    <!---  End Css Assets    -->

    <title><?= $title; ?></title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="dark-mode" id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav color-content position-relative sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class="sticky-top">
                <button type="button" class="close color-blue-font mt-3 mr-3" style="transform:scale(2)"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Sidebar - Brand -->
                <div class="sidebar-brand d-flex justify-content-start mb-4" href="<?= base_url(); ?>">
                    <a class="sidebar-brand-icon" href="<?= base_url(); ?>">
                        <img src="<?= base_url(); ?>/img/govinsy-dark.png" width="70%" alt="" id="logo" loading="lazy">
                    </a>
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item  <?php if ($page === "Statistik")  echo "active aktif"; ?>">
                    <a class="nav-link" href="<?= base_url(); ?>/statistic">
                        <i class="mr-3 ml-4 fas fa-fw fa-chart-area"></i>
                        <span>STATISTIK</span></a>
                </li>

                <li class="nav-item <?php if ($page === "Berita")  echo "active aktif"; ?>">
                    <a class="nav-link active" href="<?= base_url(); ?>/news">
                        <i class="mr-3 ml-4 fas fa-fw fa-newspaper"></i>
                        <span>BERITA</span></a>
                </li>

                <li class="nav-item <?php if ($page === "Survei")  echo "active aktif"; ?>">
                    <a class="nav-link" href="<?= base_url(); ?>/survey">
                        <i class="mr-3 ml-4 fas fa-fw fa-tag"></i>
                        <span>SURVEI</span></a>
                </li>

                <li class="nav-item <?php if ($page === "Tentang Kami")  echo "active aktif"; ?>">
                    <a class="nav-link" href="<?= base_url(); ?>/about">
                        <i class="mr-3 ml-4 fas fa-fw fa-info"></i>
                        <span>TENTANG KAMI</span></a>
                </li>

                <?php if ((isset($_SESSION['profile']['survei']) && $_SESSION['profile']['survei'] != 1) || !isset($_SESSION['profile']['survei'])) : ?>
                <!-- Survei -->
                <div id="survey" class="row justify-content-center position-relative">
                    <div class="col-sm-9 text-center d-none d-md-inline color-bg corner-round mt-5 mb-3 pb-3">
                        <img src="<?= base_url(); ?>/img/survey.png" width="70%">
                        <p class="color-light-font mt-2">Tertarik dengan website kami<a
                                href="<?= base_url(); ?>/survei"> ikuti survei</a> sekarang</p>
                        <a class="border-0 btn-dark-blue" href="<?= base_url(); ?>/survei">Survei &rarr;</a>
                    </div>
                </div>
                <?php endif; ?>


                <!-- Sidebar Toggler (Sidebar) -->
                <center>
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>
                </center>


            </div>


        </ul>
        <!-- End of Sidebar -->
        <div id="hitam-block" style="width:100%;height:100%;z-index:9999;background-color:rgba(0, 0, 0, 0.62);"
            class="position-absolute hilang"></div>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Modal Masuk -->
            <div class="modal bd-example-modal-lg fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="card o-hidden color-content border-0 shadow-lg">
                            <div class="card-body p-0">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h4 class="color-blue-font font-weight-bold mb-5 mr-5">Masuk</h4>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="<?= base_url(); ?>/register"
                                                        class="btn py-0 corner-round btn-outline-blue ml-5">Daftar</a>
                                                </div>
                                            </div>
                                            <form class="user" method="POST" action="<?= base_url(); ?>/login">
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <input name="email" type="email"
                                                        class="form-control form-inp corner-round"
                                                        id="exampleInputEmail" placeholder="Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" type="password"
                                                        class="form-control form-inp corner-round"
                                                        id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="text-center">
                                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                                </div>
                                                <hr>
                                                <button type="submit" name="login"
                                                    class="btn btn-blue btn-block corner-round">
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
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control color-content border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="topbar-divider d-none d-sm-block"></div>
                            </li>
                            <!-- Nav Item - User Information -->
                            <?php if (isset($_SESSION['login'])) : ?>
                            <li class="nav-item dropdown no-arrow pr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="text-right mt-2 my-auto">
                                        <?php if (isset($_SESSION['profile'])) : ?>
                                        <small
                                            class="mr-2 d-none d-lg-inline text-white-600l"><?= str_replace(' ', '', session()->get('profile')['name']); ?></small><br>
                                        <?php endif; ?>
                                        <small class="mr-2 d-none d-lg-inline text-gray-600 font-10"><i
                                                class="fas fa-map-marked"></i> Jawa Tengah</small>
                                    </div>
                                    <img class="img-profile rounded-circle"
                                        src="<?= base_url() ?>/img/profile/430da.jpg">
                                </a>



                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow color-content animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item color-light-font d-block"
                                        href="<?= base_url(); ?>/pengguna/profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item color-light-font d-block"
                                        href="<?= base_url(); ?>/logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>

                            </li>
                            <?php else : ?>
                            <li class="nav-item px-2 my-auto">
                                <button data-toggle="modal" data-target="#exampleModal"
                                    class="btn btn-outline-blue corner-round"><i class="fas fa-sign-in-alt"></i>
                                    Masuk</button>
                            </li>
                            <?php endif; ?>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->
                </div>

            <?= $this->renderSection('content') ?>

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer color-blue-bg">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Govinsy <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script src="<?= base_url(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>/js/propper.min.js"></script>
    <script src="<?= base_url(); ?>/js/bootstrap.js"></script>
    <script type="module" src="<?= base_url(); ?>/js/pace.js"></script>

    <script src="<?= base_url(); ?>/js/sb-admin-2.js"></script>

    <!-- Slider JS -->
    <script type="module" src="<?= base_url(); ?>/js/slider/script.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/js/chart/Chart.min.js"></script>

    <!-- Charts Javascript -->
    <script src="<?= base_url(); ?>/js/statistic/chart-pie-demo.js"></script>


    <!-- Cropper JS -->
    <script type="module" src="<?= base_url(); ?>/js/image-cropper/dropzone.js"></script>
    <script type="module" src="<?= base_url(); ?>/js/image-cropper/cropper.js"></script>


    <script src="<?= base_url(); ?>/js/script.js"></script>

</body>

</html>