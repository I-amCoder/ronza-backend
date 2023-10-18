<?php

namespace App\Models;

use App\Services\RemoveBgService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['getStatus', 'imagePath', 'nonBgImg', 'discounted_price', 'discount_percentage','is_new'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
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

    public function getNonBgImgAttribute()
    {
        return url('storage/products/images/no_bg_' . $this->image);
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount_type == "percentage") {
            $base_price = $this->base_price;
            $discount = ($base_price * $this->discount) / 100;
            $amount = $base_price - $discount;
            return showAmount($amount);
        } else {
            $base_price = $this->base_price;
            $discount = $this->discount;
            return showAmount(($base_price - $discount));
        }
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->discount_type == "percentage") {
            return "-".$this->discount . " %";
        } else {
            $percentage = ($this->discount / $this->base_price) * 100;
            return "-".$percentage. " %";
        }
    }

    public function getIsNewAttribute(){
        if($this->created_at > Carbon::now()->subDays(2)){
            return true;
        }
        return false;
    }
}
