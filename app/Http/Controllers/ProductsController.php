<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            's_description' => 'required|string',
            "price" => 'required',
            "editordata" => 'required',
            "image" => 'required',
        ]);
        $item = new Product();
        $this->submit($request, $item);
        return to_route('products.index')->withSuccess("Prodcut Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function submit($request, $item): void
    {
        $item->title = $request->title;
        $item->category_id = decrypt($request->category);
        $item->small_description = $request->s_description;
        $item->description = $request->editordata;
        $item->price = $request->price;
        $item->discounted_price = $request->discount_price;
        $item->status = $request->status == "on" ? 1 : 0;



        if ($request->hasFile('image')) {
            $uuid = Str::uuid()->toString();
            $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $request->image->extension();
            $item->image = $name;
            $request->image->storeAs('public/products/images', $name);
        }
        $item->save();

        if (!is_null($request->pimage)) {
            foreach ($request->pimage as $image) {
                $pImage = new ProductImages();
                $uuid = Str::uuid()->toString();
                $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $image->extension();
                $image->storeAs('public/products/images', $name);
                $pImage->product_id = $item->id;
                $pImage->name = $name;
            }
        }
    }
}
