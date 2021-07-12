<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OpenHousePage extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
