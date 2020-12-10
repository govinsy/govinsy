<?php namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $useTimestamp = true;
    protected $allowedFields = ['survey_id', 'question'];
}