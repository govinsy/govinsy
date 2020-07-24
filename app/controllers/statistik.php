<?php 

class statistik extends Controller {

    // Deklarasi Paramater API
    public $key = ['bps_key' => 'ae16cc87c0398c4ab14d22fa99deed75'];
    public $url = [
        'covid_ind' => 'https://covid19.mathdro.id/api/countries/IDN',
        'covid_prov' => 'https://data.covid19.go.id/public/api/prov.json',
        'bps_domain' => 'https://webapi.bps.go.id/v1/api/domain'
    ];
    public $type = [
        'all' => '&type=all', 
        'prov' => '&type=prov', 
        'kab' => '&type=kab', 
        'provbykab' => '&type=provbykab'
    ];

    // Fungsi GET JSON
    public function getData($alamat, $kunci = NULL, $arg = NULL)
    {
        $alamat = $alamat . '?key=' . $kunci . $arg ;
        $curl = curl_init($alamat);
        curl_setopt($curl, CURLOPT_URL, $alamat);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result = json_decode($result, true);
    }

    public function index()
    {
        // Kasus Covid-19 Indonesia
        $kasus = $this->getData($this->url['covid_ind']);

        // Kasus Covid-19 Provinsi
        $provinsi = $this->getData($this->url['covid_prov']);

        // Daftar Domain Provinsi
        $domain = $this->getData($this->url['bps_domain'], $this->key['bps_key'], $this->type['prov']);

        // Daftar Variable View
        $data['judul'] = 'Daftar Statistik';
        $data['confirmed'] = $kasus['confirmed']['value'];
        $data['recovered'] = $kasus['recovered']['value'];
        $data['deaths'] = $kasus['deaths']['value'];
        $data['lastUpdate'] = $kasus['lastUpdate'];   
        $data['prov'] = $provinsi['list_data'];
        $data['domain'] = $domain['data'][1];

        // $data['stat'] = $this->model('Statistik')->getAllStatistik();
        
        $this->view('templates/header', $data);
        $this->view('statistik/index', $data);
        $this->view('templates/footer');
    }

    // public function detail($id)
    // {
    //     $data['judul'] = 'Detail Statistik';
    //     $data['mhs'] = $this->model('Statistik')->getStatistikById($id);
    //     $this->view('templates/header', $data);
    //     $this->view('statistik/detail', $data);
    //     $this->view('templates/footer');
    // }

    // public function tambah()
    // {
    //     if( $this->model('Statistik')->tambahDataStatistik($_POST) > 0 ) {
    //         Flasher::setFlash('berhasil', 'ditambahkan', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'ditambahkan', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     }
    // }

    // public function hapus($id)
    // {
    //     if( $this->model('Statistik')->hapusDataStatistik($id) > 0 ) {
    //         Flasher::setFlash('berhasil', 'dihapus', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'dihapus', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     }
    // }

    // public function getubah()
    // {
    //     echo json_encode($this->model('Statistik')->getStatistikById($_POST['id']));
    // }

    // public function ubah()
    // {
    //     if( $this->model('Statistik')->ubahDataStatistik($_POST) > 0 ) {
    //         Flasher::setFlash('berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'diubah', 'danger');
    //         header('Location: ' . BASEURL . '/statistik');
    //         exit;
    //     } 
    // }

    // public function cari()
    // {
    //     $data['judul'] = 'Daftar Statistik';
    //     $data['mhs'] = $this->model('Statistik')->cariDataStatistik();
    //     $this->view('templates/header', $data);
    //     $this->view('statistik/index', $data);
    //     $this->view('templates/footer');
    // }

}