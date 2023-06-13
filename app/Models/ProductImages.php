<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $appends = ['path'];

    public function getPathAttribute()
    {
        $path = url('storage/products/images/' . $this->name);
        return $path;
    }
}
