<?php

class pengguna_model
{
    private $table = 'pengguna';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengguna()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPenggunaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPengguna($data)
    {
        $query = "INSERT INTO pengguna
                    VALUES
                  (:id, :nama, :email, :password,0)";

        $this->db->query($query);
        $this->db->bind('id', UNIQUEID);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        if ($data['password1'] != $data['password2']) {
            return 0;
        }
        $this->db->bind('password', md5($data['password1']));
        $this->db->execute();

        return $this->db->rowCount();
    }
}
