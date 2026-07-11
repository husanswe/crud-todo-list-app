<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperUploadedImage
 */
class UploadedImage extends Model
{
    protected $fillable = ['path'];
}
