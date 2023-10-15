<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImages;
use App\Models\ProductSize;
use App\Services\RemoveBgService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;




class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Excel::toArray([],public_path('/data.xlsx'));
        dd($data);

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
        // dd($request->all());


        $request->validate([
            'title' => 'required|string',
            "base_price" => 'required',
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
        $images = [];
        foreach ($product->images as $key => $image) {
            $img['id'] = $image->id;
            $img['src'] = $image->path;
            $images[] = $img;
        }
        return view('products.edit', compact('product', 'categories', 'images'));
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
        $product = Product::findOrFail($id);
        $this->submit($request, $product, true);

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
        Carousel::where('product_id', $product->id)->delete();
        $product->delete();
    }

    function submit($request, $item, $isUpdate = false): void
    {
        $item->title = $request->title;
        $item->slug = $this->generateUniqueSlug($request->title, Product::class);
        $item->category_id = decrypt($request->category);
        $item->model = $request->model;
        $item->sku = $request->sku;
        $item->qty = $request->qty ?? 0;
        $item->description = $request->editordata;
        $item->base_price = $request->base_price;
        $item->discount = $request->discount;
        $item->discount_type = $request->type;
        $item->show_in_frontend = $request->show_in_frontend == "on" ? 1 : 0;
        $item->is_featured = $request->is_featured == "on" ? 1 : 0;
        $item->is_special = $request->is_special == "on" ? 1 : 0;

        $item->meta_title = $request->meta_title;
        $item->meta_keywords = $request->meta_keywords;
        $item->meta_description = $request->meta_description;





        if ($request->hasFile('image')) {
            if ($isUpdate) {
                $name = $item->image;
                // Delete Old File
                if (Storage::exists('public/products/images/' . $name)) {
                    Storage::delete('public/products/images/' . $name);
                }
                if (Storage::exists('public/products/images/no_bg_' . $name)) {
                    Storage::delete('public/products/images/no_bg_' . $name);
                }
            } else {

                // Save Actual Image
                $uuid = Str::uuid()->toString();
                $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $request->image->extension();
                $item->image = $name;
            }
            $request->image->storeAs('public/products/images', $name);

            // $bgService = new RemoveBgService();
            // $bgService->removeProductBackground($item->imagePath, $name);
        }

        $item->save();


        // Update Or Remove Old Size and Colors

        if ($isUpdate) {
            // Sizes
            $previous_sizes = $item->sizes->pluck('id')->toArray();
            if ($request->old_size) {
                foreach ($request->old_size as $s) {
                    $size = ProductSize::find($s['size_id']);
                    if ($size) {
                        $size->size = $s['size'];
                        $size->qty = $s['qty'];
                        $size->extra_price = $s['price'];
                        $size->save();
                        $sizeToKeep[] = $size->id;
                    }
                }
            } else {
                $sizeToKeep = [];
            }
            // Remove Remaining Sizes
            $sizeToDelete = array_values(array_diff($previous_sizes, $sizeToKeep));
            ProductSize::whereIn('id', $sizeToDelete)->delete();

            // Colors
            $previous_colors =  $item->colors->pluck('id')->toArray();

            if ($request->old_color) {
                foreach ($request->old_color as $c) {
                    $color = ProductColor::find($c["color_id"]);
                    if ($color) {
                        $color->name = $c['color'];
                        $color->save();
                        $colorToKeep[] = $color->id;
                    }
                }
            } else {
                $colorToKeep = [];
            }
            // Remove Remaining Colors
            $colorToDelete = array_values(array_diff($previous_colors, $colorToKeep));
            ProductColor::whereIn('id', $colorToDelete)->delete();
        }


        if ($request->has('size')) {
            foreach ($request->size as $psize) {

                $size = new ProductSize();
                $size->product_id = $item->id;
                $size->size = $psize['number'];
                $size->extra_price = $psize['price'];
                $size->qty = $psize['qty'];
                $size->save();
            }
        }


        if ($request->has('color')) {
            foreach ($request->color as $key => $pcolor) {
                $color = new ProductColor();
                $color->name = $pcolor['color'];
                $color->product_id = $item->id;
                $color->save();
            }
        }

        // Check if update and old images are removed
        if ($isUpdate) {
            // Check Previous Imaegs
            $previous_images = $item->images->pluck('id')->toArray();
            $image_to_remove = array_values(array_diff($previous_images, $request->old_photos ?? []));

            // dd($image_to_remove);

            foreach ($image_to_remove as $img) {
                $productImage   = ProductImages::find($img);
                $file = 'public/products/images/' . $productImage->name;
                if (Storage::exists($file)) {
                    Storage::delete($file);
                }
                $productImage->delete();
            }
        }

        // Save New Images

        if ($request->has('photos')) {
            foreach ($request->photos as $key => $image) {
                $pImage = new ProductImages();
                $uuid = Str::uuid()->toString();
                $name = Str::slug($request->title, '-') . '_' . $uuid . '_' . '.' . $image->extension();
                $image->storeAs('public/products/images', $name);
                $pImage->product_id = $item->id;
                $pImage->name = $name;
                $pImage->save();
            }
        }
    }

    public function updateStock(Request $request)
    {
        $request->validate([
            'quantity' => 'required'
        ]);
        if ($request->p_id) {
            $product = Product::find($request->p_id);
            if ($product) {
                $product->qty = $request->quantity;
                $product->save();
                return back()->withSuccess("Stock Updated Successfully");
            }
        }
        return back()->withSuccess("Error while Updating the stock");
    }
}
