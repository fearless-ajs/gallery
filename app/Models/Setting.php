<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFaviconPathAttribute()
    {
        return Storage::disk('public')->url($this->favicon);
    }


    public function getIconPathAttribute()
    {
        return Storage::disk('public')->url($this->logo);
    }
}
