<?php

namespace App\Controllers;

// Lokasi method getJSON di BaseController.php
// Lokasi daftar url dan field di BaseController.php

class Premium extends BaseController
{
    public function Komparasi()
    {
        // Daftar Domain Provinsi
        $domain = $this->getJSON($this->url['bps_domain'], $this->field['key']['bps_key'] . $this->field['type']['prov']);

        if (isset($_POST['provinsi1']) && isset($_POST['provinsi2'])) {


            // Deskripsi Provinsi
            $provdescs = $this->getJSON($this->url['provdesc']);

            $stat = [];
            for ($j = 1; $j < count($_POST); $j++) {
                //Ambil Data Satistik Sesuai domain ID di url 
                $provinsi = $this->getJSON($this->url['bps_strategic'], $this->field['key']['bps_key'] . $this->field['model']['indicators'] . 'domain=' . $_POST['provinsi' . $j]);

                //Ambil Data Strategic indicator sesuai title (Karena indicator id per provinsi berbeda)
                if (isset($provinsi)) {
                    for ($i = 0; $i < count($provinsi['data'][1]); $i++) {
                        if (strstr($provinsi['data'][1][$i]['title'], 'Persentase Penduduk')) {
                            $stat['provinsi' . $j]['penduduk_miskin'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Pengangguran')) {
                            $stat['provinsi' . $j]['pengangguran'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Impor')) {
                            $stat['provinsi' . $j]['impor'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Ekspor')) {
                            $stat['provinsi' . $j]['ekspor'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Ekonomi Triwulan')) {
                            $stat['provinsi' . $j]['triwulan'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Angka Harapan Hidup')) {
                            $stat['provinsi' . $j]['harapan_hidup'] = $provinsi['data'][1][$i];
                        } elseif (strstr($provinsi['data'][1][$i]['title'], 'Inflasi')) {
                            $stat['provinsi1']['inflasi'] = $provinsi['data'][1][$i];
                        }
                    }
                }

                foreach ($provdescs as $provdesc) {
                    if ($provdesc['id_prov']  == $_POST['provinsi' . $j]) {
                        array_push($stat['provinsi' . $j], $provdesc);
                    }
                }
            }

            $data['desc']           = $stat;
        }

        $data['judul']          = 'Komparasi Statistik';
        $data['page']          = 'Komparasi'; //Digunakan untuk indikator di Sidebar
        $data['domains']   = $domain['data'][1]; // daftar domain provinsi


        // Views
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('premium/komparasi', $data);
        echo view('templates/footer');
    }
}
