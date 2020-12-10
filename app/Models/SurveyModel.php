<?php namespace App\Models;

use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table = 'surveys';
    protected $useTimestamp = true;
    protected $allowedFields = ['title', 'description', 'created_at', 'updated_at'];
}