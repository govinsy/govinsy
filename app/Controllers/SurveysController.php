<?php

namespace App\Controllers;

class SurveysController extends BaseController
{
    public function __construct() {
        if (!session()->has('profile')) {
            echo "<script>
            alert('Silahkan login terlebih dahulu sebelum mengikuti survei');
            window.location.replace('" . base_url() . "/login');
            </script>";
        } 
    }

    public function index()
    {
        $data['title'] = 'Survei Govinsy';
        $data['page'] = 'Survei'; //Digunakan untuk indikator di Sidebar
        $data['questions'] = $this->questionModel->get();
        $data['answers'] = $this->answerModel->get();
        $data['has_filled'] = 0;

        //Views
        echo view('surveys/index', $data);
    }

    public function save()
    {
        // Mengolah data dari form
        foreach ($questions as $p) {
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
