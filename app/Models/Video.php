<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getVideoPathAttribute(){
        $string = str_replace('width', '', $this->link);
        $string = str_replace('height', '', $string);
        return $string;
    }
}
