<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function carousel()
    {
        $products = Product::all();
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
