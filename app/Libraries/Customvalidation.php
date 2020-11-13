<?php

namespace App\Libraries;

use PharIo\Manifest\Library;

class Customvalidation extends Library
{

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function UserCheck(string $mainfield, string $fieldtotestwith): bool
    {
        $mainfield = $_POST["{$mainfield}"];
        $pengguna = $this->pengguna_model->getPenggunaByEmail($mainfield);

        if ($pengguna  > 0) {
            return true;
        } else {
            return false;
        }
    }

    // public function CustomMethod($var1, $var2)
    // {
    //     $sql = "SELECT var1 as Var_1,var2 as Var_2 FROM table WHERE var1=? OR var2=?";

    //     return $result = $this->db->query($sql, [$var1, $var2]);
    // }
}
