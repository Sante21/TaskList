<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'type',
        'description'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
