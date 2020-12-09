<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamp = true;
    protected $allowedFields = ['name', 'email', 'password', 'picture', 'created_at', 'updated_at'];
}