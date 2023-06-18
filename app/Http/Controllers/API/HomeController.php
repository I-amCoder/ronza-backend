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
        if ($category == 'All') {
            return ProductsResource::collection(Product::paginate(4));
        }
        $category = Category::find($category);
        if ($category) {
            $products = Product::where('category_id', $category->id)->paginate(4);
            return ProductsResource::collection($products);
        } else {
            return response()->json("Cat no found", 404);
        }
    }

    public function searchProducts(Request $request)
    {
        $query = $request->q;
        if ($query && $query != '') {
            $products = Product::where('title', 'like', "%{$query}%")
                ->orWhere('small_description', 'like', "%{$query}%")
                ->paginate(4);
        } else {
            $products = Product::paginate(4);
        }
        return ProductsResource::collection($products);
    }

    public function showProduct($slug)
    {
        $product = Product::where('slug',$slug)->first();
        if ($product) {
            $category = $product->category;
            $data = new ProductsResource($product);
            $data['category'] = new CategoryResource($category);
            return $data;
        }
    }
}
