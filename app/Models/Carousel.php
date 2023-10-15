<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return url('/carousel/images/' . $this->image);
    }
}
