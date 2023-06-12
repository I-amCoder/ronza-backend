<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\SiteResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return new SiteResource(Site::find(1));
    }

    public function getCategories()
    {
        return  CategoryResource::collection(Category::all());
    }

    public function getProducts($category)
    {
        if($category=='All'){
            return ProductsResource::collection(Product::all());
        }
        $category = Category::find($category);
        if ($category) {
            $products = Product::where('category_id', $category->id)->get();
            return ProductsResource::collection($products);
        } else {
            return response()->json("Cat no found", 404);
        }
    }
}
