<?php

namespace App\Http\Resources;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['newArrivals'] = ProductsResource::collection(Product::latest()->take(10)->get());
        $data['carousels'] = CarouselResource::collection(Carousel::all());
        $data['categories'] = CategoryResource::collection(Category::all());
        unset($data['created_at']);
        unset($data['updated_at']);
        return $data;
    }
}
