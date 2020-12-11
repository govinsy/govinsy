<?php namespace App\Models;

use CodeIgniter\Model;

class UserAnswerModel extends Model
{
    protected $table = 'user_answers';
    protected $useTimestamp = true;
    protected $allowedFields = ['user_id', 'answer_id'];
}