  <!-- Sidebar -->
  <ul class="navbar-nav color-content position-relative sidebar sidebar-dark accordion" id="accordionSidebar">

      <div class="sticky-top">

          <!-- Sidebar - Brand -->
          <div class="sidebar-brand d-flex align-items-left justify-content-start mb-4" href="<?= BASEURL; ?>">
              <a class="sidebar-brand-icon justify-content-start" href="<?= BASEURL; ?>">
                  <img src="<?= BASEURL; ?>/img/govinsy-dark.png" width="70%" alt="" loading="lazy">
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

          <li class="nav-item <?php if ($data['page'] === "Survey")  echo "active aktif"; ?>">
              <a class="nav-link disable" href="<?= BASEURL; ?>/survey">
                  <i class="mr-3 ml-4 fas fa-fw fa-tag"></i>
                  <span>SURVEY</span></a>
          </li>

          <li class="nav-item <?php if ($data['page'] === "Tentang Kami")  echo "active aktif"; ?>">
              <a class="nav-link" href="<?= BASEURL; ?>/tentang">
                  <i class="mr-3 ml-4 fas fa-fw fa-info"></i>
                  <span>TENTANG KAMI</span></a>
          </li>




          <!-- Survey -->
          <div id="survey" class="row justify-content-center position-relative">
              <div class="col-sm-9 text-center d-none d-md-inline color-bg corner-round mt-5 mb-3 pb-3">
                  <img src="<?= BASEURL; ?>/img/survey.png" width="70%">
                  <p class="color-light-font mt-2">Tertarik dengan website kami<a href="<?= BASEURL; ?>/survey"> ikuti survey</a> sekarang</p>
                  <a class="border-0 btn-dark-blue" href="<?= BASEURL; ?>/survey">Survey &rarr;</a>
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