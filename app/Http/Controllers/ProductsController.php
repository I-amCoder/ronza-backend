<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\RemoveBgService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
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
        $request->validate([
            'title' => 'required|string',
            's_description' => 'required|string',
            "price" => 'required',
            "editordata" => 'required',
        ]);
        // dd($request->all());
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->category_id = decrypt($request->category);
        $product->small_description = $request->s_description;
        $product->description = $request->editordata;
        $product->price = $request->price;
        $product->discounted_price = $request->discount_price;
        $product->status = $request->status == "on" ? 1 : 0;


        if ($request->hasFile('image')) {
            $name = $product->image;
            // Delete Old File
            if (Storage::exists('public/products/images/' . $name)) {
                Storage::delete('public/products/images/' . $name);
            }
            $request->image->storeAs('public/products/images', $name);
            $bgService = new RemoveBgService();
            $bgService->removeProductBackground($product->imagePath, $name);
        }
        if (isset($request->pimage)) {
            foreach ($request->pimage as $img) {
                if (isset($img['id'])) {
                    $pImage = ProductImages::where(['product_id' => $product->id, 'id' => $img['id']])->firstOrFail();
                } else {
                    $pImage = new ProductImages();
                }
                if (isset($img['file'])) {
                    // Save the Image
                    $uuid = Str::uuid()->toString();
                    $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $img['file']->extension();
                    $img['file']->storeAs('public/products/images', $name);
                    $pImage->product_id = $product->id;
                    $pImage->name = $name;
                    $pImage->save();
                }
            }
        }
        $product->update();

        return to_route('products.index')->withSuccess("Product Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteWithImages($product);
        return back()->withSuccess('Product Deleted Successfully');
    }

    public function deleteWithImages($product)
    {
        // Delete Images and data
        foreach ($product->images as $image) {
            $file = 'public/products/images/' . $image->name;
            if (Storage::exists($file)) {
                Storage::delete($file);
            }
            $image->delete();
        }
        $file = 'public/products/images/' . $product->image;
        if (Storage::exists($file)) {
            Storage::delete($file);
        }
        $product->delete();
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
            // Save Actual Image
            $uuid = Str::uuid()->toString();
            $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $request->image->extension();
            $item->image = $name;
            $request->image->storeAs('public/products/images', $name);

            $bgService = new RemoveBgService();
            $bgService->removeProductBackground($item->imagePath, $name);
        }



        $item->save();

        if (!is_null($request->pimage)) {
            foreach ($request->pimage as $image) {
                $pImage = new ProductImages();
                $uuid = Str::uuid()->toString();
                $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $image['file']->extension();
                $image['file']->storeAs('public/products/images', $name);
                $pImage->product_id = $item->id;
                $pImage->name = $name;
                $pImage->save();
            }
        }
    }
}
