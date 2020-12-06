  <!-- Sidebar -->
  <ul class="navbar-nav color-content-sidebar position-relative sidebar sidebar-dark accordion" id="accordionSidebar">

      <div class="sticky-top">
          <button type="button" class="close color-blue-font mt-3 mr-3" style="transform:scale(2)" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <!-- Sidebar - Brand -->
          <div class="sidebar-brand d-flex justify-content-start mb-4" href="<?= base_url(); ?>">
              <a class="sidebar-brand-icon" href="<?= base_url(); ?>">
                  <img src="<?= base_url(); ?>/img/govinsy-dark.png" width="70%" alt="" id="logo" loading="lazy">
              </a>
          </div>





          <!-- Nav Item - Charts -->
          <li class="nav-item  <?php if ($page === "Statistik")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= base_url(); ?>/statistik">
                  <i class="mr-3 ml-4 fas fa-fw fa-chart-area"></i>
                  <span>STATISTIK</span></a>
          </li>

          <li class="nav-item <?php if ($page === "Berita")  echo "active aktif"; ?>">
              <a class="nav-link active" href="<?= base_url(); ?>/berita">
                  <i class="mr-3 ml-4 fas fa-fw fa-newspaper"></i>
                  <span>BERITA</span></a>
          </li>

          <li class="nav-item <?php if ($page === "Survei")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= base_url(); ?>/survei">
                  <i class="mr-3 ml-4 fas fa-fw fa-tag"></i>
                  <span>SURVEI</span></a>
          </li>

          <li class="nav-item <?php if ($page === "Tentang Kami")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= base_url(); ?>/tentang">
                  <i class="mr-3 ml-4 fas fa-fw fa-info"></i>
                  <span>TENTANG KAMI</span></a>
          </li>



          <?php if ((isset($_SESSION['profile']['survei']) && $_SESSION['profile']['survei'] != 1) || !isset($_SESSION['profile']['survei'])) : ?>
              <!-- Survei -->
              <div id="survey" class="row justify-content-center position-relative">
                  <div class="col-sm-9 text-center d-none d-md-inline color-bg corner-round mt-5 mb-3 pb-3">
                      <img src="<?= base_url(); ?>/img/survey.png" width="70%">
                      <p class="color-content-font mt-2">Tertarik dengan website kami<a href="<?= base_url(); ?>/survei"> ikuti survei</a> sekarang</p>
                      <a class="border-0 btn-dark-blue" href="<?= base_url(); ?>/survei">Survei &rarr;</a>
                  </div>
              </div>
          <?php endif; ?>


          <!-- Sidebar Toggler (Sidebar) -->
          <center>
              <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>
          </center>


      </div>


  </ul>
  <!-- End of Sidebar -->
  <div id="hitam-block" style="width:100%;height:100%;z-index:9999;background-color:rgba(0, 0, 0, 0.62);" class="position-absolute hilang"></div>