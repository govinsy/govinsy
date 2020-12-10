<?= $this->extend('templates/base') ?>
<?= $this->section('content') ?>
<?php use Coduo\PHPHumanizer\DateTimeHumanizer; ?>
<?php use CodeIgniter\I18n\Time; ?>
<div class="container">
    <h3 class="text-gray-700">BERITA TERKINI</h3>
    <hr class="color-content mb-4 divider">

    <!-- Berita -->

    <div class="row row-cols-1 row-cols-md-2">
        <?php if (isset($news)) : ?>
            <?php foreach ($news as $new) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card color-content">
                        <img src="<?= $new['urlToImage']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title color-light-font font-weight-bold"><a href="<?= $new['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none color-light-font"><?= $new['title']; ?></a></h5>
                            <p class="card-text text-gray-600"><?= $new['description']; ?> <a href="<?= $new['url']; ?>" target="_blank" rel="noopener noreferrer" class="text-decoration-none">read more</a></p>
                            <p class="card-text float-left"><small class="text-muted"><?= $new['source']['name'] ?></small></p>
                            <p class="card-text float-right"><small class="text-muted"><?= DateTimeHumanizer::difference(Time::now(), new \DateTime($new['publishedAt']), 'id_ID');?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="container">
                <p class="text-danger font-weight-bold">Gagal mengambil data Berita : periksa koneksi internet anda</p>
            </div>
        <?php endif ?>

    </div>
</div>
<?= $this->endSection() ?>