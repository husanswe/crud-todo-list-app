<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'done', 'priority'];

    protected $casts = ['done' => 'boolean'];

    public function scopeCompleted($query)
    {
        return $query->where('done', true);
    }
}