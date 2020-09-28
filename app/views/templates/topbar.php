<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content" class="color-bg">

        <div id="topbar" class="position-sticky sticky-top">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <?php if ($data['page'] === "Statistik" || $data['page'] === "Berita") : ?>
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
                                <div class="text-right">
                                    <?php if (isset($_SESSION['profile'])) : ?>
                                        <small class="mr-2 d-none d-lg-inline text-white-600 small"><?= str_replace(' ', '', $_SESSION['profile']['nama']); ?></small><br>
                                    <?php endif; ?>
                                    <small class="mr-2 d-none d-lg-inline text-gray-600  font-kecil"><i class="fas fa-map-marked"></i> Jawa Tengah</small>
                                </div>
                                <img class="img-profile rounded-circle" src="<?= BASEURL; ?>/img/profile.jpg">
                            </a>



                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= BASEURL; ?>/pengguna/login">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= BASEURL; ?>/pengguna/logout">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>

                        </li>
                    <?php else : ?>
                        <li class="nav-item pr-3">
                            <a href="<?= BASEURL; ?>/pengguna/login">Masuk</a>
                        </li>
                    <?php endif; ?>

                </ul>

            </nav>
            <!-- End of Topbar -->
        </div>