<style>
    body {
        background-color: #0B0F24;
    }

    footer {
        display: none;
    }
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content" class="pb-5 color-bg">

        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="row">
                        <div class="col-lg-12 text-center mt-5 mb-4">
                            <img src="<?= BASEURL ?>/img/govinsy-dark.png" class="mb-3" width="20%" alt="">
                            <h2 class="color-light-font mt-3 font-26 font-weight-bold mb-1">Daftar</h2>
                            <p class="color-light-font font-12">Daftar sekarang dan dapatkan fitur lengkap</p>
                        </div>
                    </div>

                    <div class="card o-hidden color-content border-0 shadow-lg">
                        <div class="card-body p-0">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <form class="user" method="POST" action="<?= BASEURL; ?>/pengguna/daftar">
                                            <?php Flasher::flash(); ?>
                                            <div class="form-group">
                                                <label for="inputNama" class="font-16 color-gray-font">Nama</label>
                                                <input name="nama" type="input" id="inputNama" class="form-control form-inp corner-round" placeholder="Nama" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="font-16 color-gray-font">Email</label>
                                                <input name="email" type="email" id="inputEmail" class="form-control form-inp corner-round" placeholder="Email" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword1" class="font-16 color-gray-font">Password</label>
                                                <input name="password1" type="password" id="inputPassword1" class="form-control form-inp corner-round" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword2" class="font-16 color-gray-font">Confirm Password</label>
                                                <input name="password2" type="password" id="inputPassword2" class="form-control form-inp corner-round" placeholder="Confirm Password" required>
                                            </div>
                                            <hr>
                                            <button type="submit" name="daftar" class="btn btn-blue btn-block corner-round">
                                                Daftar
                                            </button>
                                            <p class="mt-3 color-light-font font-12 mt-4 mb-1 text-center">sudah punya akun? masuk sekarang</p>
                                            <a href="<?= BASEURL; ?>/pengguna/login" class="btn btn-outline-blue corner-round btn-block"> <i class="fas fa-sign-in-alt"></i> Masuk</a>
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