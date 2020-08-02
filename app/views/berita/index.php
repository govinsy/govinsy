<div class="container">
    <div class="jumbotron mt-4">
        <h1 class="display-4">Berita</h1>
        <p class="lead">Sistem Informasi Pemerintah dan Data Statistik Dampak dari Covid-19</p>
        <hr class="my-4">
    </div>

    <!-- Berita -->

    <div class="row row-cols-1 row-cols-md-2">

        <?php foreach($data['berita'] as $berita): ?>
        <div class="col-4 mb-4">
            <div class="card">
                <img src="<?= $berita['urlToImage']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?= $berita['title']; ?></h5>
                    <p class="card-text"><?= $berita['description']; ?> <a href="<?= $berita['url']; ?>" class="text-decoration-none">read more</a></p>
                    <p class="card-text float-left"><small class="text-muted"><?= $berita['source']['name'] ?></small></p>
                    <p class="card-text float-right"><small class="text-muted"><?= date('d/m/Y', strtotime($berita['publishedAt'])); ?></small></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>