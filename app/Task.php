<?php

namespace todo;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = ['id', 'task_name'];
    
}
