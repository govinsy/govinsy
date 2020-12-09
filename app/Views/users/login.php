<?= $this->extend('templates/base') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <div class="jumbotron mt-4 color-content py-5 px-5 text-center">
                <form class="form-signin" method="POST" action="<?= base_url(); ?>/login">
                    <img class="mb-5" src="<?= base_url(); ?>/img/govinsy-dark.png" alt="" width="40%">
                    <?= csrf_field(); ?>
                    <?= session()->getFlashdata('message') ?>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input name="email" type="email" id="inputEmail" class="form-control form-inp corner-round <?= ($validation->hasError('email')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Email" value="<?= old('email'); ?>" required autofocus>
                    <div class="invalid-feedback color-red-font">
                        <?= $validation->getError('email') ?>
                    </div>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control form-inp mt-4 corner-round <?= ($validation->hasError('password')) ? 'is-invalid border-red-1' : 'mb-4'; ?>" placeholder="Password" required>
                    <div class="invalid-feedback color-red-font">
                        <?= $validation->getError('password') ?>
                    </div>
                    <a href="<?= base_url(); ?>/pengguna/lupapassword">lupa password?</a>
                    <hr class="color-gray-bg mt-4 opacity-5">
                    <button name="login" class="btn btn-blue corner-round btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Masuk</button>
                    <p class="mt-3 color-light-font font-12 mt-4 mb-1">belum memiliki akun?</p>
                    <a href="<?= base_url(); ?>/pengguna/daftar" class="btn btn-outline-blue corner-round btn-block">Daftar</a>
                </form>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>