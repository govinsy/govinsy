</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer color-footer-bg">
    <div class="container my-auto">
        <div class="copyright color-light-font text-center my-auto">
            <span>Copyright &copy; Govinsy <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<script src="<?= base_url(); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url(); ?>/js/propper.min.js"></script>
<script src="<?= base_url(); ?>/js/bootstrap.js"></script>
<script type="module" src="<?= base_url(); ?>/js/pace.js"></script>

<script src="<?= base_url(); ?>/js/sb-admin-2.js"></script>

<?php if ($page == "Statistik") :  ?>
    <!-- Slider JS -->
    <script type="module" src="<?= base_url(); ?>/js/slider/script.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/js/chart/Chart.min.js"></script>

    <!-- Charts Javascript -->
    <script src="<?= base_url(); ?>/js/statistic/chart-pie-demo.js"></script>
<?php endif;  ?>

<!-- Form Validation JQuery -->
<script src="<?= base_url(); ?>/js/form-validation/jquery.validate.js"></script>

<!-- Switch Toggle JQuery -->
<script src="<?= base_url(); ?>/js/jquery.enhanced-switch.js"></script>


<?php if ($page == "Profile") :  ?>
    <!-- Cropper JS -->
    <script type="module" src="<?= base_url(); ?>/js/image-cropper/dropzone.js"></script>
    <script type="module" src="<?= base_url(); ?>/js/image-cropper/cropper.js"></script>
<?php endif;  ?>

<script src="<?= base_url(); ?>/js/script.js"></script>

</body>

</html>