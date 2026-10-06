<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'created_at'
    ];
    protected $useTimestamps = false;
    protected $returnType = 'array';
     public function getActiveTasks()
        {
            return $this->where('is_archived', 0)->findAll();
        }
}