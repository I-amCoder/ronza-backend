<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function image_path($type = "top_banner_1")
    {
        if ($this[$type]) {
            return url('/sites/banners/' . $this[$type]);
        } else {
            return null;
        }
    }
}
