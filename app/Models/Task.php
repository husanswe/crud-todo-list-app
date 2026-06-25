<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'done', 'priority'];

    protected $casts = ['done' => 'boolean'];

    public function scopeCompleted(Builder $query)
    {
        return $query->where('done', true);
    }
}