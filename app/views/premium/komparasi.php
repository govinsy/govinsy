 <div class="container" id="page" data-page="Premium">


   <?php if (isset($_POST['provinsi1']) && isset($_POST['provinsi2'])) : ?>
     <div class="row justify-content-center text-center mb-5">

       <div class="col-sm-4">
         <div class="color-content mx-auto rounded-circle shadow border-green-bold p-4 size-200 d-flex align-items-center">
           <div class="mx-auto">
             <img src="<?= base_url() . "/img/provinsi/logo/" . $desc['provinsi1'][0]['id_prov'] . ".png" ?>" class="size-50" alt="">
             <p class="font-weight-bold mt-2 color-content-font"><?= $desc['provinsi1'][0]['Provinsi']  ?></p>
           </div>
         </div>
       </div>

       <div class="col-sm-4 d-flex align-items-center my-4">
         <div class="color-content shadow corner-round p-4 mx-auto">
           <p class="color-content-font">Point Aspek Keseluruhan</p>
           <a href="<?= base_url() ?>/Premium/komparasi">Pilih Provinsi</a>
         </div>
       </div>

       <div class="col-sm-4">
         <div class="color-content mx-auto rounded-circle shadow border-red-bold p-4 size-200 d-flex align-items-center">
           <div class="mx-auto">
             <img src="<?= base_url() . "/img/provinsi/logo/" . $desc['provinsi2'][0]['id_prov'] . ".png" ?>" class="size-50" alt="">
             <p class="font-weight-bold mt-2 color-content-font"><?= $desc['provinsi2'][0]['Provinsi']  ?></p>
           </div>
         </div>
       </div>

     </div>


     <div class="d-block text-center mb-4">
       <h3 class="corner-round color-blue-bg color-light-font p-2 d-inline-block font-20 mx-auto">GEOGRAFI</h3>
     </div>

     <div class="row mb-5">

       <!-- Geografi -->
       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative">
             <div class="row justify-content-center">
               <div class="peta col-sm-6">
                 <img class="ml-3" src="<?php echo base_url() . "/img/provinsi/peta/" . $desc['provinsi1'][0]['id_prov'] . ".svg"; ?>" width="90%" alt="">
               </div>
               <div class="info-wilayah pl-4 col-sm-6">
                 <small class="text-gray-600">LUAS WILAYAH</small>
                 <h5><?= $desc['provinsi1'][0]['Luas Total'] ?>
                   <small style="font-size:1rem;"><sub>KM <sup>2</sup></sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">JUMLAH PENDUDUK</small>
                 <h5><?= $desc['provinsi1'][0]['Populasi'] ?>
                   <small style=" font-size:1rem;"><sub>Jiwa</sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">KEPADATAN PENDUDUK</small>
                 <h5><?= $desc['provinsi1'][0]['Populasi / Luas'] ?>
                   <small style=" font-size:1rem;"><sub>Jiwa/KM <sup>2</sup></sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">PULAU</small>
                 <h5><?= $desc['provinsi1'][0]['Pulau'] ?></h5>
               </div>
             </div>

           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative">
             <div class="row justify-content-center">
               <div class="peta col-sm-6">
                 <img class="ml-3" src="<?= base_url() . "/img/provinsi/peta/" . $desc['provinsi2'][0]['id_prov']  . ".svg"; ?>" width="90%" alt="">
               </div>
               <div class="info-wilayah pl-4 col-sm-6">
                 <small class="text-gray-600">LUAS WILAYAH</small>
                 <h5><?= $desc['provinsi2'][0]['Luas Total'] ?>
                   <small style="font-size:1rem;"><sub>KM <sup>2</sup></sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">JUMLAH PENDUDUK</small>
                 <h5><?= $desc['provinsi2'][0]['Populasi'] ?>
                   <small style=" font-size:1rem;"><sub>Jiwa</sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">KEPADATAN PENDUDUK</small>
                 <h5><?= $desc['provinsi2'][0]['Populasi / Luas'] ?>
                   <small style=" font-size:1rem;"><sub>Jiwa/KM <sup>2</sup></sub></small>
                 </h5>
                 <small class="text-gray-600 mt-5">PULAU</small>
                 <h5><?= $desc['provinsi2'][0]['Pulau'] ?></h5>
               </div>
             </div>

           </div>
         </div>

       </div>
       <!-- Geografi End-->

     </div>



     <!-- Ekonomi -->
     <div class="d-block text-center mb-4">
       <h3 class="corner-round color-blue-bg color-light-font p-2 d-inline-block font-20 mx-auto">EKONOMI</h3>
     </div>

     <!-- Ekonomi APBD -->
     <div class="d-block text-center mb-3">
       <h3 class="color-content-font font-16">APBD</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-weight-bold">Rp. <?= $desc['provinsi1'][0]['APBD 2014 (miliar rupiah)'] ?> <sub class="font-12 font-weight-normal">Miliar</sub></h2>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-weight-bold">Rp. <?= $desc['provinsi2'][0]['APBD 2014 (miliar rupiah)'] ?> <sub class="font-12 font-weight-normal">Miliar</sub></h2>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Ekonomi APBD End-->


     <!-- Ekonomi PDRB -->
     <div class="d-block text-center mb-3 mt-5">
       <h3 class="color-content-font font-16">PDRB</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-weight-bold">Rp. <?= $desc['provinsi1'][0]['PDRB 2014 (triliun rupiah)'] ?> <sub class="font-12 font-weight-normal">Triliun</sub></h2>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-weight-bold">Rp. <?= $desc['provinsi2'][0]['PDRB 2014 (triliun rupiah)'] ?> <sub class="font-12 font-weight-normal">Triliun</sub></h2>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Ekonomi PDRB End-->


     <!-- Ekonomi PDRB per Kapita -->
     <div class="d-block text-center mb-3 mt-5">
       <h3 class="color-content-font font-16">PDRB per Kapita</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row mb-5">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-weight-bold">Rp. 1.500.000.00 <sub class="font-12 font-weight-normal">Miliar</sub></h2>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-weight-bold">Rp. 1.500.000.00 <sub class="font-12 font-weight-normal">Miliar</sub></h2>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Ekonomi PDRB per Kapita End-->


     <!-- Ekonomi End-->



     <!-- Sosial -->

     <div class="d-block text-center mb-4 mt-3">
       <h3 class="corner-round color-blue-bg color-light-font p-2 d-inline-block font-20 mx-auto">SOSIAL</h3>
     </div>

     <!-- Sosial Penduduk Miskin -->
     <div class="d-block text-center mb-3">
       <h3 class="color-content-font font-16">Penduduk Miskin</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-36 font-weight-bold"><?= $desc['provinsi1']['penduduk_miskin']['value'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-green-bg corner-round" role="progressbar" style="width: <?= $desc['provinsi1']['penduduk_miskin']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-36 font-weight-bold"><?= $desc['provinsi2']['penduduk_miskin']['value'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-red-bg corner-round" role="progressbar" style="width: <?= $desc['provinsi2']['penduduk_miskin']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Sosial Penduduk Miskin End-->


     <!-- Sosial Angka Pengangguran -->
     <div class="d-block text-center mb-3 mt-5">
       <h3 class="color-content-font font-16">Angka Pengangguran</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-36 font-weight-bold"><?= $desc['provinsi1']['pengangguran']['value'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-green-bg corner-round" role="progressbar" style="width: <?= $desc['provinsi1']['pengangguran']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-36 font-weight-bold"><?= $desc['provinsi2']['pengangguran']['value'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-red-bg corner-round" role="progressbar" style="width: <?= $desc['provinsi2']['pengangguran']['value'] ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Sosial Angka Pengangguran End-->



     <!-- Sosial Index Pembangunan Manusia -->
     <div class="d-block text-center mb-3 mt-5">
       <h3 class="color-content-font font-16">Index Pembangunan Manusia</h3>
       <hr class="color-gray-bg">
     </div>
     <div class="row">


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-green-font font-36 font-weight-bold"><?= $desc['provinsi1'][0]['IPM 2014'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-green-bg corner-round" role="progressbar" style="width: <?= str_replace(',', '.', $desc['provinsi1'][0]['IPM 2014']) ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-green-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


       <div class="col-lg-6">

         <div style="border:none;" class="card shadow color-content corner-round mb-4">
           <div class="card-body color-content-font mt-3 position-relative p-5">
             <h2 class="color-red-font font-36 font-weight-bold"><?= $desc['provinsi2'][0]['IPM 2014'] ?>% / <sub class="font-20 font-weight-normal">15.000 Jiwa</sub></h2>
             <div class="progress color-bg mb-4 corner-round" style="height:15px">
               <div class="progress-bar color-red-bg corner-round" role="progressbar" style="width: <?= str_replace(',', '.', $desc['provinsi2'][0]['IPM 2014']) ?>%" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             <p class="font-12 color-red-font">Lorem ipsum dolor cit amet, logrem ipsum dolor. Lorem ipsum dolor cit amet, logrem ipsum dolor</p>
           </div>
         </div>

       </div>


     </div>
     <!-- Sosial Index Pembangunan Manusia End-->

     <!-- Sosial End-->


   <?php else : ?>


     <!-- Modal Pilih Provinsi -->
     <div class="modal bd-example-modal-lg fade" id="modal-prov" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg corner-round color-content-font" role="document">
         <div class="modal-content py-4 px-4 color-content corner-round">

           <h2>Pilih Provinsi</h2>
           <input type="text" class="form-inp-dark corner-round border-gray-1 my-2 color-content-font" placeholder="Cari Provinsi ...">
           <ul class="list-style-none mt-3" style="margin-left:-40px">
             <?php foreach ($domains as $domain) : ?>
               <li class="color-bg modal-provinsi mr-2 mb-3 float-left corner-round shadow py-4 px-4 text-center pointer press-active position-relative" data-dismiss="modal" data-provid="<?= $domain['domain_id'] ?>" data-provnama="<?= $domain['domain_name'] ?>" style="width:11rem;height:10rem">
                 <input type="checkbox" class="rounded-circle position-absolute mr-3" style="right:0;">
                 <img src="<?= base_url() . '/img/provinsi/logo/' . $domain['domain_id'] . '.png' ?>" class="size-50 mt-2" alt="">
                 <p class="color-content-font font-16 mt-3"><?= $domain['domain_name'] ?></p>
               </li>
             <?php endforeach; ?>
           </ul>
           <!-- <div class="card corner-round modal-provinsi data-provid=" 3300" data-provnama="asd" o-hidden color-content border-0 shadow-lg">
         <div class="card-body p-0">

         </div>
       </div> -->

         </div>

       </div>
     </div>
     <!-- End Modal Pilih Provinsi -->

     <!-- Pilih Provinsi -->
     <div class="row justify-content-center">
       <div class="col-lg-12">

         <div class="jumbotron justify-content-center color-content text-center color-content-font  shadow corner-round">
           <form action="" method="POST">
             <div class="row">


               <div class="col-lg-4">

                 <div data-toggle="modal" data-target="#modal-prov" class="card color-bg shadow border-gray-1 corner-round pointer mx-auto" id="provinsi1" style="width: 18rem;">
                   <div class="card-body">
                     <img src="<?= base_url() ?>/img/nopic.png" alt="" width="35%">
                     <p class="card-text mt-2">Pilih Provinsi</p>
                     <input type="hidden" name="provinsi1" value="0">
                   </div>
                 </div>

               </div>


               <div class="col-lg-4 py-4">
                 <h2>VS</h2>
                 <button id="bandingkan" type="button" name="bandingkan" class="btn btn-blue-opt corner-round opacity-5">Bandingkan</button>
               </div>


               <div class="col-lg-4">

                 <div data-toggle="modal" data-target="#modal-prov" class="card color-bg shadow border-gray-1 corner-round pointer mx-auto" id="provinsi2" style="width: 18rem;">
                   <div class="card-body">
                     <img src="<?= base_url() ?>/img/nopic.png" alt="" width="35%">
                     <p class="card-text mt-2">Pilih Provinsi</p>
                     <input type="hidden" name="provinsi2" value="0">

                   </div>
                 </div>

               </div>



             </div>
           </form>
         </div>


       </div>
     </div>
     <!-- End Pilih Provinsi -->
   <?php endif; ?>



 </div>