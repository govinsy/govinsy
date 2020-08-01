<?php 

class Statistik {
    private $table = 'statistik';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // public function getAllStatistik()
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table);
    //     return $this->db->resultSet();
    // }

    // public function getStatistikById($id)
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //     $this->db->bind('id', $id);
    //     return $this->db->single();
    // }

    // public function tambahDataStatistik($data)
    // {
    //     $query = "INSERT INTO statistik
    //                 VALUES
    //               ('', :nama, :nrp, :email, :jurusan)";
        
    //     $this->db->query($query);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('nrp', $data['nrp']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('jurusan', $data['jurusan']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    // public function hapusDataStatistik($id)
    // {
    //     $query = "DELETE FROM statistik WHERE id = :id";
        
    //     $this->db->query($query);
    //     $this->db->bind('id', $id);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }


    // public function ubahDataStatistik($data)
    // {
    //     $query = "UPDATE statistik SET
    //                 nama = :nama,
    //                 nrp = :nrp,
    //                 email = :email,
    //                 jurusan = :jurusan
    //               WHERE id = :id";
        
    //     $this->db->query($query);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('nrp', $data['nrp']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('jurusan', $data['jurusan']);
    //     $this->db->bind('id', $data['id']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }


    // public function cariDataStatistik()
    // {
    //     $keyword = $_POST['keyword'];
    //     $query = "SELECT * FROM statistik WHERE nama LIKE :keyword";
    //     $this->db->query($query);
    //     $this->db->bind('keyword', "%$keyword%");
    //     return $this->db->resultSet();
    // }

}