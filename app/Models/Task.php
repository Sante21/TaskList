<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'completed',
        'date',
        'asignto',
        'priority'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
