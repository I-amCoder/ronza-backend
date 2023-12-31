<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return to_route('category.index')->with(['showCeate' => true]);
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
            'name' => 'required|string',
            'title' => 'required|string',
        ]);
        $category = new Category();
        $this->submit($request, $category);

        return redirect()->back()->withMessage(['type' => 'success', 'message' => 'Category Updated Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
            'name' => 'required|string',
            'title' => 'required|string',
        ]);
        $category = Category::findOrFail(decrypt($id));
        $this->submit($request, $category);

        return redirect()->back()->withMessage(['type' => 'success', 'message' => 'Category Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $path = 'public/categories/logos/' . $category->logo;
        if (Storage::exists($path) && $category->logo != 'default.png') {
            Storage::delete($path);
        }
        // Delete All Products with Images
        foreach($category->products as $product){
            $controller = new ProductsController();
            $controller->deleteWithImages($product);
        }
        $category->delete();

        return back()->withSuccess("Category Deleted Successfully");
    }

    function submit($request, $category)
    {
        $category->name = $request->name;
        $category->slug = $this->generateUniqueSlug($request->name, Category::class);
        $category->title = $request->title;


        if ($request->hasFile('logo')) {
            $uuid = Str::uuid()->toString();
            $name = $uuid . '_' . Str::slug($request->name, '-') . '.' . $request->logo->extension();
            $category->logo = $name;
            $request->logo->storeAs('public/categories/logos',  $name);
        }
        $category->save();
    }
}
