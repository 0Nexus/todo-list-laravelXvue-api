<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'todo_id';
    protected $fillable = [
        'title',
        'desc',
        'deadline',
    ];
    //
}
