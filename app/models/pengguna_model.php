<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_model extends Model
{
    protected $table = 'pengguna';

    public function getAllPengguna()
    {
        $query = $this->db->query("SELECT * FROM {$this->table}");
        return $query->getResultArray();
    }

    public function getPenggunaById($id)
    {
        $query = $this->db->query("SELECT * FROM {$this->table} WHERE id = '{$id}' ");
        return $query->getRowArray();
    }

    public function tambahPengguna()
    {
        $data = [
            'id' => UNIQUEID,
            'nama'  => $_POST['nama'],
            'email'  => $_POST['email'],
            'password'  => md5($_POST['password1']),
            'survei'  => 0,
            'gambar'  => 'default.png'
        ];

        return $this->db->table($this->table)->insert($data);
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
            window.location.replace('" . base_url() . "/pengguna/profile');
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
            $this->db->table($this->table)->where('id', $_SESSION['profile']['id'])->update(['gambar' => $namaFile]);
            //End mengubah nama file gambar di database

            $_SESSION['profile']['gambar'] = $namaFile; //Mengubah session nama gambar agar berubah saat berganti gambar
        }
        /// End cek apakah yang diupload file gambar

    }


    public function removeImage()
    {
        if ($_SESSION['profile']['gambar'] == 'default.png') {
            echo "<script>
            alert('Silahkan pilih file gambar yang valid');
            window.location.replace('" . base_url() . "/pengguna/profile');
            </script>";
        } else {
            //Hapus gambar lama
            if (file_exists(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']) && ($_SESSION['profile']['gambar'] != 'default.png')) {
                unlink(BASEPATH . "/public/img/profile/" . $_SESSION['profile']['gambar']);
            }
            //End hapus gambar lama

            //Mengubah nama file gambar di database
            $this->db->table($this->table)->where('id', $_SESSION['profile']['id'])->update(['gambar' => 'default.png']);
            //End mengubah nama file gambar di database

            $_SESSION['profile']['gambar'] = 'default.png'; //Mengubah session nama gambar menjadi default
            header("Location:" . base_url() . "/pengguna/profile");
            exit;
        }
    }
}
