<div id="data-provinsi" align="center" class="jumbotron pb-5 mb-0 img-content color-light-font">
    <h1 class="mt-5">Data Per Provinsi</h1>
</div>
<ul id="daftar-provinsi" align="center" class="color-content hilang list-unstyled mb-0 container">

    <?php if (isset($domains)) : ?>
    <?php $i = 1;
      foreach ($domains['data'][1] as $domain) : ?>
    <?php if ($i == 1) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">SUMATERA</li>
    <?php elseif ($i == 11) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">JAWA</li>
    <?php elseif ($i == 17) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">BALI & NUSA TENGGARA</li>
    <?php elseif ($i == 20) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">KALIMANTAN</li>
    <?php elseif ($i == 25) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">SULAWESI</li>
    <?php elseif ($i == 31) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">MALUKU</li>
    <?php elseif ($i == 33) : ?>
    <li class="color-light-font pt-4 font-bold pb-1 pt-1">PAPUA</li>
    <?php endif;
        $i++; ?>
    <li class="color-light-font pb-1 pt-1"><a
            href="<?= base_url(); ?>/statistic/prov?domain=<?= $domain['domain_id'] ?>&prov=<?= $domain['domain_name']  ?>">Provinsi
            <?= $domain['domain_name']; ?></a></li>
    <?php endforeach; ?>
    <?php else : ?>
    <p class="text-danger font-weight-bold">gagal mengambil data: periksa koneksi internet</p>
    <?php endif ?>

</ul>
<div id="provinsi-toggle" style="border-radius: 0px 0px 20px 20px " class="color-blue-bg text-center">
    <h3><button class="bt-none color-light-font"><i class="fas fa-chevron-down"></i></button></h3>
</div>

<script>
    $(document).ready(function () {
        $('#provinsi-toggle').on('click', function () {
            $('#daftar-provinsi').removeClass('hilang')
        })
    })
</script>