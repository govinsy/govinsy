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
                            <h2 class="color-light-font mt-3 font-26 font-weight-bold mb-1">Daftar</h2>
                            <p class="color-light-font font-12">Daftar sekarang dan dapatkan fitur lengkap</p>
                        </div>
                    </div>

                    <div class="card o-hidden color-content border-0 shadow-lg">
                        <div class="card-body p-0">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <form class="user" method="POST" action="<?= base_url(); ?>/pengguna/daftar">
                                            <?= csrf_field(); ?>
                                            <?= session()->getFlashdata('message') ?>


                                            <div class="form-group">
                                                <label for="inputNama" class="font-16 <?= ($validation->hasError('nama')) ? 'color-red-font' : 'color-gray-font'; ?> ">Nama</label>
                                                <input name="nama" type="text" id="inputNama" class="form-control form-inp corner-round <?= ($validation->hasError('nama')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Nama" value="<?= old('nama'); ?>" required autofocus>
                                                <div class="invalid-feedback color-red-font">
                                                    <?= $validation->getError('nama') ?>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputEmail" class="font-16 <?= ($validation->hasError('email')) ? 'color-red-font' : 'color-gray-font'; ?>">Email</label>
                                                <input name="email" type="email" id="inputEmail" class="form-control form-inp corner-round <?= ($validation->hasError('email')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Email" value="<?= old('email'); ?>" required>
                                                <div class="invalid-feedback color-red-font">
                                                    <?= $validation->getError('email') ?>
                                                </div>
                                                <div id="emailValid" class="font-12 text-gray-600 mt-1"><i class="fas fa-times color-red-font"></i> Format Email Valid</div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputPassword1" class="font-16 <?= ($validation->hasError('password1')) ? 'color-red-font' : 'color-gray-font'; ?>">Password</label>
                                                <div class="password position-relative">
                                                    <i id="togglePassword" class="fas fa-eye color-gray-font position-absolute pointer click-opacity" style="right:0;margin:12px 20px 0 0;"></i>
                                                    <input name="password1" type="password" id="inputPassword1" class="form-control form-inp corner-round <?= ($validation->hasError('password1')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Password" required>
                                                </div>
                                                <div class="invalid-feedback color-red-font">
                                                    <?= $validation->getError('password1') ?>
                                                </div>
                                                <div id="password" class="font-12 text-gray-600 mt-1"><i class="fas fa-times color-red-font"></i> Beisi setidaknya 8 karakter</div>
                                                <div id="password_spc" class="font-12 text-gray-600 mt-1"><i class="fas fa-times color-red-font"></i> Terdapat setidaknya 1 huruf kapital</div>
                                                <div id="password_chr" class="font-12 text-gray-600 mt-1"><i class="fas fa-times color-red-font"></i> Tidak terdapat karakter spesial</div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputPassword2" class="font-16 <?= ($validation->hasError('password2')) ? 'color-red-font' : 'color-gray-font'; ?>">Confirm Password</label>
                                                <input name="password2" type="password" id="inputPassword2" class="form-control form-inp corner-round <?= ($validation->hasError('password2')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Confirm Password" required>
                                                <div class="invalid-feedback color-red-font">
                                                    <?= $validation->getError('password2') ?>
                                                </div>
                                                <div id="password1" class="font-12 text-gray-600 mt-1"><i class="fas fa-times color-red-font"></i> Cocok dengan input password</div>
                                            </div>


                                            <hr>
                                            <button type="submit" name="daftar" class="btn btn-blue btn-block corner-round">
                                                Daftar
                                            </button>
                                            <p class="mt-3 color-light-font font-12 mt-4 mb-1 text-center">sudah punya akun? login sekarang</p>
                                            <a href="<?= base_url(); ?>/pengguna/login" class="btn btn-outline-blue corner-round btn-block"> <i class="fas fa-sign-in-alt"></i> Login</a>
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