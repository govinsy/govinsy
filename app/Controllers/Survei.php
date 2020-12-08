<?php

namespace App\Controllers;

class Survei extends BaseController
{
    public function index()
    {
        $pertanyaan = $this->survei_model->getAllPertanyaan();
        $jawaban = $this->survei_model->getAllJawaban();

        if (isset($_SESSION['profile']['id'])) {
            $pengguna = $this->pengguna_model->getPenggunaById($_SESSION['profile']['id']);
            $data['ikutSurvei'] = $pengguna['survei']; // Cek apakah sudah mengikuti survei
            // Cek mencegah dupilkat data
            $cari = $this->survei_model->findPengguna($_SESSION['profile']['id']);
            if (!isset($cari)) {
                if ($cari != false) {

                    // Flasher::setFlash('gagal', 'anda sudah pernah mengisi survei', 'danger');
                } else {

                    // Mengolah data dari form
                    foreach ($pertanyaan as $p) {
                        if (isset($_POST[$p['id']])) {

                            // Menyiapkan data untuk model
                            $jp['id'] = substr(uniqid(), 8, 5);
                            $jp['id_jawaban'] = $_POST[$p['id']];
                            $jp['id_pengguna'] = $_SESSION['profile']['id'];
                            $jp['respon'] = "";

                            // Input data
                            if ($this->survei_model->tambahJawabanPengguna($jp)) {
                                // Flasher::setFlash('berhasil', 'jawaban anda berhasil dimasukan', 'success');

                                // $this->survei_model->tambahJawabanPengguna($jp);
                            } else {
                                // Flasher::setFlash('gagal', 'jawaban anda gagal dimasukan', 'danger');

                            }
                        }
                    }
                }
            }
        } else {
            echo "<script>
            alert('Silahkan login terlebih dahulu sebelum mengikuti survei');
            window.location.replace('" . base_url() . "/pengguna/login');
            </script>";
        }




        $data['judul'] = 'Survei Govinsy';
        $data['page'] = 'Survei'; //Digunakan untuk indikator di Sidebar
        $data['pertanyaan'] = $pertanyaan;
        $data['jawaban'] = $jawaban;

        //Views
        echo view('templates/header', $data);
        echo view('templates/sidebar', $data);
        echo view('templates/topbar', $data);
        echo view('survei/index', $data);
        echo view('templates/footer');
    }
}
