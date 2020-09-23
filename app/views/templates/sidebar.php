  <!-- Sidebar -->
  <ul class="navbar-nav color-content position-relative sidebar sidebar-dark accordion" id="accordionSidebar">

      <div class="sticky-top">
          <button type="button" class="close color-blue-font mt-3 mr-3" style="transform:scale(2)" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <!-- Sidebar - Brand -->
          <div class="sidebar-brand d-flex justify-content-start mb-4" href="<?= BASEURL; ?>">
              <a class="sidebar-brand-icon" href="<?= BASEURL; ?>">
                  <img src="<?= BASEURL; ?>/img/govinsy-dark.png" width="70%" alt="" id="logo" loading="lazy">
              </a>
          </div>





          <!-- Nav Item - Charts -->
          <li class="nav-item  <?php if ($data['page'] === "Statistik")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= BASEURL; ?>/statistik">
                  <i class="mr-3 ml-4 fas fa-fw fa-chart-area"></i>
                  <span>STATISTIK</span></a>
          </li>

          <li class="nav-item <?php if ($data['page'] === "Berita")  echo "active aktif"; ?>">
              <a class="nav-link active" href="<?= BASEURL; ?>/berita">
                  <i class="mr-3 ml-4 fas fa-fw fa-newspaper"></i>
                  <span>BERITA</span></a>
          </li>

          <li class="nav-item <?php if ($data['page'] === "Survei")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= BASEURL; ?>/survei">
                  <i class="mr-3 ml-4 fas fa-fw fa-tag"></i>
                  <span>SURVEI</span></a>
          </li>

          <li class="nav-item <?php if ($data['page'] === "Tentang Kami")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= BASEURL; ?>/tentang">
                  <i class="mr-3 ml-4 fas fa-fw fa-info"></i>
                  <span>TENTANG KAMI</span></a>
          </li>




          <!-- Survei -->
          <div id="survey" class="row justify-content-center position-relative">
              <div class="col-sm-9 text-center d-none d-md-inline color-bg corner-round mt-5 mb-3 pb-3">
                  <img src="<?= BASEURL; ?>/img/survey.png" width="70%">
                  <p class="color-light-font mt-2">Tertarik dengan website kami<a href="<?= BASEURL; ?>/survei"> ikuti survei</a> sekarang</p>
                  <a class="border-0 btn-dark-blue" href="<?= BASEURL; ?>/survei">Survei &rarr;</a>
              </div>
          </div>


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