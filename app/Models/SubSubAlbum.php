<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SubSubAlbum extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);

    }

    public function album()
    {
        return $this->belongsTo(SubAlbum::class, 'sub_album_id');
    }


}
