<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}