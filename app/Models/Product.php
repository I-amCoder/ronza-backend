<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['getStatus', 'imagePath'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }

    function getGetStatusAttribute()
    {
        $status = $this->status == 1 ? "Active" : "InActive";
        $badge = $this->status == 1 ? "success" : "danger";
        $status = '<span class="badge  badge-' . $badge . '">' . $status . '</span>';
        return $status;
    }

    function getImagePathAttribute()
    {
        $path = url('storage/products/images/' . $this->image);
        return $path;
    }
}
