<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'task_id',
        'comment'
    ];

    //Propiedades
    /*================= Many to one =================== */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
