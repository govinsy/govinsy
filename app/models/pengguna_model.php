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
                  (:id, :nama, :email, :password,0,'default.png')";

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

    // public function editPengguna($data)
    // {
    //     $query = "UPDATE FROM pengguna
    //                 SET
    //               ()";

    //     $this->db->query($query);
    //     $this->db->bind('id', $data['id']);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    public function editProfile()
    {
        //Hapus gambar lama bila berganti gambar profile
        if (file_exists(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']) && ($_SESSION['profile']['gambar'] != 'default.png')) {
            unlink(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']);
        }
        //End hapus gambar lama bila berganti gambar profile

        $namaFile = $_POST['name']; //Ambil nama fle dari ajax di scriptjs

        //Memecah nama file dan ekstensi
        $ekstensigambar = ['jpg', 'jpeg', 'png', 'gif'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));
        //End memecah nama file dan ekstensi

        /// Cek apakah yang diupload file gambar
        if (!in_array($ekstensi, $ekstensigambar)) {
            echo "<script>
            alert('Silahkan pilih file gambar yang valid');
            window.location.replace('" . BASEURL . "/pengguna/profile');
            </script>";
        } else {
            $namaFile = $_SESSION['profile']['id'];
            $namaFile .= '.' . $ekstensi;

            $data = $_POST['image'];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_path = 'img/profile/' . $namaFile;
            file_put_contents($image_path, $data); //Upload gambar

            //Mengubah nama file gambar di database
            $query = "UPDATE pengguna SET gambar='$namaFile' WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $_SESSION['profile']['id']);
            $this->db->execute();
            //End mengubah nama file gambar di database


            $_SESSION['profile']['gambar'] = $namaFile; //Mengubah session nama gambar agar berubah saat berganti gambar
        }
        /// End cek apakah yang diupload file gambar

    }


    public function removeImage()
    {
        if ($_SESSION['profile']['gambar'] == 'default.png') {
            header('location:' . BASEURL . '/pengguna/profile');
        } else {
            //Hapus gambar lama
            if (file_exists(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']) && ($_SESSION['profile']['gambar'] != 'default.png')) {
                unlink(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']);
            }
            //End hapus gambar lama

            //Mengubah nama file gambar di database
            $query = "UPDATE pengguna SET gambar='default.png' WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $_SESSION['profile']['id']);
            $this->db->execute();
            //End mengubah nama file gambar di database

            $_SESSION['profile']['gambar'] = 'default.png'; //Mengubah session nama gambar menjadi default
            header('location:' . BASEURL . '/pengguna/profile');
        }
    }
}
