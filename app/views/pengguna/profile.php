<div class="container" align="center">

    <!--- Profile -->
    <div class="row justify-content-center">
        <div class="col-md-5">

            <?= session()->getFlashdata('message') ?>
            <div class="color-content mb-3 text-center card border-0 py-4 rounded">
                <div class=" card-body rounded">
                    <div class="image_area">
                        <form method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <!--- Profile Gambar -->
                            <img src=" <?= base_url() ?>/img/profile/<?= $_SESSION['profile']['gambar'] ?>" width="200" height="200" id="uploaded_image" class="pointer hover-opacity-6 img-responsive rounded-circle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                            <div style="margin:160px 0 0 -43px" class="rounded-circle color-blue-bg color-light-font p-2 font-12 d-inline position-absolute"><i class="fas fa-edit"></i></div>
                            <input type="file" name="image" class="image" id="upload_image" style="display:none" />

                            <!-- Dropdown - menu gambar -->
                            <div style="margin-left:10px;" class="dropdown-menu dropdown-menu-center shadow animated--grow-in text-center" aria-labelledby="userDropdown">
                                <label for="upload_image" class="pointer dropdown-item d-block">
                                    Ganti Gambar
                                </label>
                                <?php if ($_SESSION['profile']['gambar'] != 'default.png') : ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item d-block" href="<?= base_url(); ?>/pengguna/removepic">Hilangkan Gambar</a>
                                <?php endif; ?>
                            </div>
                            <!-- End dropdown - menu gambar -->

                            <!--- End profile Gambar -->

                            <h2 class="color-light-font font-weight-bold mt-2 mb-0"><?= $_SESSION['profile']['nama'] ?></h2>
                            <p class="font-16 color-gray-font mt-0"><i class="fas fa-map-marked-alt"></i> Jawa Tengah</p>

                            <div class="row justify-content-center">
                                <div class="col-6 text-center px-2">

                                    <button type="button" id="btn-edit" class="btn btn-blue-opt corner-round px-5 py-1 my-2"><i class="fas fa-edit"></i> Edit Profile</button><br>
                                    <div class="color-gray-bg pt-4 pb-4 p-2 mb-2 hilang" id="form-edit" style="margin: -20px 2px 0 2px;border-radius:0 0 1rem 1rem">
                                        <form method="POST" action="">
                                            <?= csrf_field(); ?>

                                            <div class="form-group">
                                                <input name="nama" type="text" id="inputNama" class="form-inp-dark corner-round <?php($validation->hasError('nama')) ? 'is-invalid border-red-1' : ''; ?>" placeholder="Nama" value="<?= $_SESSION['profile']['nama']; ?>" required autofocus>
                                                <div class="invalid-feedback color-red-font">
                                                    <?= $validation->getError('password2') ?>
                                                </div>
                                            </div>

                                            <button type="submit" name="edit" class="btn btn-green btn-block corner-round">Edit</button>

                                        </form>
                                    </div>

                                    <a href="<?= base_url() ?>/pengguna/logout" class="btn btn-red corner-round px-5 py-1"><i class="fas fa-sign-out-alt"></i> Keluar</a>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!--- End Profile -->




<!--- Modal Ganti Gambar -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content color-content">


            <div class="modal-body pb-4">
                <div class="img-container">

                    <!--- Crop canvas -->
                    <div class="row justify-content-center">
                        <div class="col-11 pl-0">
                            <img src="" id="sample_image" />
                            <hr class="color-gray-bg">
                        </div>
                    </div>
                    <!--- End crop canvas -->

                    <!--- Ganti gambar button -->
                    <div class="row">
                        <div class="col-12 pr-0 pl-4 mt-1">
                            <button style="width:95%" type="button" id="crop" class="btn btn-blue corner-round mb-3">Simpan</button><br>
                            <button style="width:95%" type="button" class="btn btn-secondary corner-round" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                    <!--- End ganti gambar button -->

                </div>

            </div>

        </div>
    </div>
</div>
<!--- End Modal Ganti Gambar -->