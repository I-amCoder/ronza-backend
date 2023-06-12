<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends = ['logo_path'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function getLogoPathAttribute()
    {
        return url('categories/logos/' . $this->logo);
    }

}
