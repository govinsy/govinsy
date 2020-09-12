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

    public function getAllPertanyaan()
    {
        $this->db->query('SELECT * FROM ' . $this->table['pertanyaan']);
        return $this->db->resultSet();
    }

    public function getAllJawaban()
    {
        $this->db->query('SELECT * FROM ' . $this->table['jawaban']);
        return $this->db->resultSet();
    }

    public function getAllJawabanPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table['jawaban_pengguna']);
        return $this->db->resultSet();
    }

    public function countJawabanPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table['jawaban_pengguna']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahJawabanPengguna($data)
    {
        $query = 'INSERT INTO jawaban_pengguna
                    VALUES
                  (:id, :id_jawaban, :id_pengguna, :respon)';
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_jawaban', $data['id_jawaban']);
        $this->db->bind('id_pengguna', $data['id_pengguna']);
        $this->db->bind('respon', $data['respon']);
        $this->db->execute();

        return $this->db->rowCount();
    }

}