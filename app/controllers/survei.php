<?php

class survei extends Controller
{
    public function index()
    {
        $pertanyaan = $this->model('survei_model')->getAllPertanyaan();
        $jawaban = $this->model('survei_model')->getAllJawaban();

        if (isset($_SESSION['profile']['id'])) {

            // Cek mencegah dupilkat data
            $cari = $this->model('survei_model')->findPengguna($_SESSION['profile']['id']);
            if (isset($cari)) {
                if ($cari != false) {
                    Flasher::setFlash('gagal', 'anda sudah pernah mengisi survei', 'danger');
                } else {
                    // Mengolah data dari form
                    foreach ($pertanyaan as $p) {
                        if (isset($_POST[$p['id']])) {

                            // Menyiapkan data untuk model
                            $jp['id'] = substr(uniqid(), 8, 5);
                            $jp['id_jawaban'] = $_POST[$p['id']];
                            $jp['id_pengguna'] = $_SESSION['profile']['id'];
                            $jp['respon'] = '';

                            // Input data
                            if ($this->model('survei_model')->tambahJawabanPengguna($jp) > 0) {
                                Flasher::setFlash('berhasil', 'jawaban anda berhasil dimasukan', 'success');
                            } else {
                                Flasher::setFlash('gagal', 'jawaban anda gagal dimasukan', 'danger');
                            }
                        }
                    }
                }
            }
        } else {
            echo "<script>alert('Anda harus login dulu sebelum mengikuti survei')</script>";
            header('location:' . BASEURL . '/pengguna/login');
        }



        $data['ikutSurvei'] = $this->model('pengguna_model')->getPenggunaById($_SESSION['profile']['id']); // Cek apakah sudah mengikuti survei
        $data['judul'] = 'Survei Govinsy';
        $data['page'] = 'Survei'; //Digunakan untuk indikator di Sidebar
        $data['pertanyaan'] = $pertanyaan;
        $data['jawaban'] = $jawaban;

        //Views
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('survei/index', $data);
        $this->view('templates/footer');
    }
}
