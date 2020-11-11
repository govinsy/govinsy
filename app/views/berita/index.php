<div class="container">
    <h3 class="text-gray-700">BERITA TERKINI</h3>
    <hr class="color-content mb-4 divider">

    <!-- Berita -->

    <div class="row row-cols-1 row-cols-md-2">
        <?php if (isset($berita)) : ?>
            <?php foreach ($berita as $beritas) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card color-content">
                        <img src="<?= $beritas['urlToImage']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title color-light-font font-weight-bold"><a href="<?= $beritas['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none color-light-font"><?= $beritas['title']; ?></a></h5>
                            <p class="card-text text-gray-600"><?= $beritas['description']; ?> <a href="<?= $beritas['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">read more</a></p>
                            <p class="card-text float-left"><small class="text-muted"><?= $beritas['source']['name'] ?></small></p>
                            <p class="card-text float-right"><small class="text-muted"><?= date('d/m/Y', strtotime($beritas['publishedAt'])); ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="container">
                <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi internet</p>
            </div>
        <?php endif ?>

    </div>
    <?php var_dump($berita); ?>
</div>