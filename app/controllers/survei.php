<?php 

class survei extends Controller {
    public function index()
    {
        $pertanyaan = $this->model('survei_model')->getAllPertanyaan();
        $jawaban = $this->model('survei_model')->getAllJawaban();

        // Mengolah data dari form
        foreach ($pertanyaan as $p) {
            if (isset($_POST[$p['id']])) {
    
                // Menyiapkan data untuk model
                $jp['id'] = substr(uniqid(), 8, 5);
                $jp['id_jawaban'] = $_POST[$p['id']];
                $jp['id_pengguna'] = 'cac3e';
                $jp['respon'] = '';
    
                // Input data
                if ($this->model('survei_model')->tambahJawabanPengguna($jp) > 0) {
                    Flasher::setFlash('berhasil', 'jawaban anda berhasil dimasukan', 'success');
                } else {
                    Flasher::setFlash('gagal', 'jawaban anda gagal dimasukan', 'danger');
                }
            }
        }

        $data['judul'] = 'Survei Govinsy';
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