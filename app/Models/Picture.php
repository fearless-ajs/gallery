<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getOriginalImagePathAttribute()
    {
        return Storage::disk('public')->url($this->original_image);

    }

    public function getOptimizedImagePathAttribute()
    {
        return Storage::disk('thumbnail')->url($this->optimized_image);

    }
}
