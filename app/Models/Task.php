<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'done', 'priority'];

    protected $casts = ['done' => 'boolean'];

    public function scopeCompleted($query)
    {
        return $query->where('done', true);
    }
}