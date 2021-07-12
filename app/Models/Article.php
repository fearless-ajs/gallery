<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImage1PathAttribute()
    {
        return Storage::disk('public')->url($this->image_1);

    }

    public function getImage2PathAttribute()
    {
        return Storage::disk('public')->url($this->image_2);

    }

    public function getImage3PathAttribute()
    {
        return Storage::disk('public')->url($this->image_3);

    }
}
