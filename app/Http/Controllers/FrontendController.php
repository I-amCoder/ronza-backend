<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        $data['featured_products'] = Product::where('is_featured',true)->get();
        $data['special_products'] = Product::where('is_special',true)->get();
        $data['carousels'] = Carousel::where('status',1)->get();
        return view('frontend.index',compact('data'));
    }

    public function carousel()
    {
        $carousels = Carousel::all();
        return view('frontend.carousel',compact('products','carousels'));
    }

    public function saveCarousel(Request $request)
    {
        $request->validate([
            'product'=>'required',
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'status'=>'required',
        ]);

        if($request->carousel_id){
            $carousel = Carousel::findOrFail(decrypt($request->carousel_id));
        }else{
            $carousel = new Carousel();
        }
        $carousel->product_id = $request->product;
        $carousel->title = $request->title;
        $carousel->subtitle = $request->subtitle;
        $carousel->status = $request->status;
        $carousel->save();

        return back()->withSuccess("Carousel Saved Successfully");

    }

    public function deleteCarousel($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();
        return back()->withSuccess("Carousel Item Deleted Successfully");
    }
}
