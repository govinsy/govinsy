<?php namespace App\Models;

use CodeIgniter\Model;

class UrlModel extends Model
{
    protected $table = 'urls';
    protected $primaryKey = 'name';
    protected $useTimestamp = true;
}