<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamp = true;
    protected $allowedFields = ['name', 'email', 'password', 'picture', 'is_active', 'last_login','created_at', 'updated_at'];
}