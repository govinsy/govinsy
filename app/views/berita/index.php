<div class="container">
    <h3 class="text-gray-700">BERITA TERKINI</h3>
    <hr class="color-content mb-4 divider">

    <!-- Berita -->

    <div class="row row-cols-1 row-cols-md-2">
        <?php if (isset($berita)) : ?>
            <?php foreach ($berita as $beritas) : ?>
                <div class="col-lg-4 mb-4">
                    <a href="<?= $beritas['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                        <div class="card color-content hover-card corner-round">
                            <img src="<?= $beritas['urlToImage']; ?>" class="card-img-top corner-round-top" alt="...">
                            <div class="card-body">
                                <div class="bar-blue my-3"></div>
                                <h5 class="card-title color-content-font font-weight-bold"><?= $beritas['title']; ?></h5>
                                <p class="card-text text-gray-600"><?= $beritas['description']; ?></p>
                                <p class="card-text float-left"><small class="color-blue-font "><?= $beritas['source']['name'] ?></small></p>
                                <p class="card-text float-right"><small class="color-blue-font"><?= date('d/m/Y', strtotime($beritas['publishedAt'])); ?></small></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="container">
                <p class="text-danger font-weight-bold">Gagal mengambil data Berita : periksa koneksi internet anda</p>
            </div>
        <?php endif ?>

    </div>
</div>