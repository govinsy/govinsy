<?php

namespace App\Models;

use CodeIgniter\Model;

class Survei_model extends Model
{

    public function getAllPertanyaan()
    {
        return $this->db->query("SELECT * FROM pertanyaan")->getResultArray();
    }

    public function getAllJawaban()
    {
        return $this->db->query("SELECT * FROM jawaban")->getResultArray();
    }

    public function getAllJawabanPengguna()
    {
        return $this->db->query("SELECT * FROM jawaban_pengguna")->getResultArray();
        // return $this->db->query("SELECT j.id,jp.id_jawaban,j.id_pertanyaan,j.jawaban FROM jawaban_pengguna jp
        //                                                 INNER JOIN jawaban j ON jp.id_jawaban = j.id ")->getResultArray();
    }

    public function findPengguna($id)
    {
        return $this->db->query("SELECT * FROM jawaban_pengguna WHERE id_pengguna='{$id}' ")->getRowArray();
    }

    public function countJawabanPengguna()
    {
        return $this->db->table('jawaban_pengguna')->countAll();
    }

    public function tambahJawabanPengguna($data)
    {
        $query = " INSERT INTO jawaban_pengguna
                            VALUES ( '{$data['id']}', '{$data['id_jawaban']}', '{$data['id_pengguna']}', '{$data['respon']}' ) ";

        $this->db->table('pengguna')->where('id', $data['id_pengguna'])->update(['survei' => 1]);

        return $this->db->query($query);
    }
}
