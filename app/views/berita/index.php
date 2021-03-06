<div class="container">
    <h3 class="text-gray-700">BERITA TERKINI</h3>
    <hr class="color-content mb-4 divider">

    <!-- Berita -->

    <div class="row row-cols-1 row-cols-md-2">
        <?php if (isset($data['berita'])) : ?>
            <?php foreach ($data['berita'] as $berita) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card color-content">
                        <img src="<?= $berita['urlToImage']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title color-light-font font-weight-bold"><a href="<?= $berita['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none color-light-font"><?= $berita['title']; ?></a></h5>
                            <p class="card-text text-gray-600"><?= $berita['description']; ?> <a href="<?= $berita['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">read more</a></p>
                            <p class="card-text float-left"><small class="text-muted"><?= $berita['source']['name'] ?></small></p>
                            <p class="card-text float-right"><small class="text-muted"><?= date('d/m/Y', strtotime($berita['publishedAt'])); ?></small></p>
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

</div>