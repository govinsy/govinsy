<?php namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $table = 'agents';
    protected $useTimestamp = true;
    protected $allowedFields = ['agent', 'platform' , 'browser', 'version', 'robot', 'mobile', 'referrer', 'ip', 'host', 'valid_ip', 'visited_at'];
}