<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

/**
 * @mixin IdeHelperTask
 */
class Task extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'done', 'priority'];

    protected $casts = ['done' => 'boolean'];

    public function scopeCompleted(Builder $query)
    {
        return $query->where('done', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}