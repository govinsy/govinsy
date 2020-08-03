<?php 

class survei_model {
    private $table = [
        'survei' => 'survei',
        'pertanyaan' => 'pertanyaan',
        'jawaban' => 'jawaban',
        'jawaban_pengguna' => 'jawaban_pengguna',
        'pengguna' => 'pengguna',
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

}