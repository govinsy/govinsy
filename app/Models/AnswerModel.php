<?php namespace App\Models;

use CodeIgniter\Model;

class AnswerModel extends Model
{
    protected $table = 'answers';
    protected $useTimestamp = true;
    protected $allowedFields = ['question_id', 'answer', 'type'];
}