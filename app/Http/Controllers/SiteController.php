<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Carousel;
use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{
    public function settings($hash = null)
    {
        $site = Site::findOrFail(1);
        return view('site.settings', compact('site'));
    }

    public function updateSettings(Request $request, $hash = null)
    {

        $request->validate([
            'site_name' => 'required|string',
            'email' => 'sometimes:email',
            'address' => 'sometimes:string',
            'phone' => 'sometimes:string',

        ]);

        // Update Common
        $site = Site::findOrFail(1);
        $site->site_name = strip_tags($request->site_name);
        $site->address = strip_tags($request->address) ?? "";
        $site->phone = strip_tags($request->phone) ?? "";
        $site->email = strip_tags($request->email) ?? "";
        $site->currency = strip_tags($request->currency) ?? "";
        $site->currency_symbol = strip_tags($request->currency_symbol) ?? "";

        // Update Social

        $site->facebook = $request->facebook ??  "";
        $site->twitter = $request->twitter ??  "";
        $site->instagram = $request->instagram ??  "";
        $site->youtube = $request->youtube ??  "";
        $site->pinterest = $request->pinterest ??  "";
        $site->meta_title = $request->meta_title ??  "";
        $site->meta_description = $request->meta_description ??  "";
        $site->meta_keywords = $request->meta_keywords ??  "";

        // Upload Images
        if ($request->hasFile('image')) {

            $uuid = Str::uuid()->toString();
            $name = $uuid . '_' . Str::slug($request->title, '-') . '.' . $request->image->extension();
            $site->image = $name;

            $request->image->move(public_path('sites/images'),  $name);
        }
        if ($request->hasFile('logo')) {
            $uuid = Str::uuid()->toString();
            $name = $uuid . '_' . Str::slug($request->title, '-') . '.' . $request->logo->extension();
            $site->logo = $name;
            $request->logo->move(public_path('sites/logos'),  $name);
        }

        $site->update();
        return redirect()->back()->withMessage(['type' => 'success', 'message' => 'Site Updated Successfully']);
    }


    public function carousel()
    {
        $carousels = Carousel::all();
        return view('frontend.carousel', compact('carousels'));
    }

    public function saveCarousel(Request $request)
    {
        $isUpdate = false;
        if ($request->carousel_id) {
            $isUpdate = true;
        }
        $rules = [];
        if (!$isUpdate) {
            $rules['image'] = 'required|mimes:png,jpg,jpeg';
        }

        $request->validate($rules);


        if ($isUpdate) {
            $carousel = Carousel::findOrFail(decrypt($request->carousel_id));
        } else {
            $carousel = new Carousel();
        }

        if ($request->hasFile('image')) {
            if ($isUpdate) {
                // Delete Old Image File
                $file = public_path('/carousel/images/' . $carousel->image);
                if (File::exists($file)) {
                    File::delete($file);
                }
            }
            // Save New Image
            $name = 'carousel_' . uniqid() . '.' . $request->file('image')->extension();
            $carousel->image = $name;
            $request->image->move(public_path('carousel/images/'),  $name);
        }

        $carousel->heading = json_encode($request->heading) ?? "";
        $carousel->title = json_encode($request->title) ?? "";
        $carousel->subtitle = json_encode($request->subtitle) ?? "";
        $carousel->link_to_product = $request->link ?? "";
        $carousel->status = intval($request->status);
        $carousel->save();

        $message = "Carousel " . $isUpdate ? "Updated" : "Saved" . " successfully";
        return back()->withSuccess($message);
    }

    public function deleteCarousel($id)
    {
        $carousel = Carousel::findOrFail($id);
        $file = public_path('/carousel/images/' . $carousel->image);
        if (File::exists($file)) {
            File::delete($file);
        }
        $carousel->delete();
        return back()->withSuccess("Carousel Item Deleted Successfully");
    }

    // Banners

    public function siteBanner()
    {
        $banners = Banner::first();
        return view('site.banners', compact('banners'));
    }

    public function saveBanner(Request $request)
    {
        $request->validate([
            'top_banner_1' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
            'top_banner_2' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
            'middle_banner_1' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
            'middle_banner_2' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
            'middle_banner_3' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
            'bottom_banner_1' => ['sometimes' => ['mimes' => ['png', 'jpg', 'jpeg']]],
        ]);

        $isUpdate = true;

        $banner = Banner::first();
        if (!$banner) {
            $banner = new Banner();
            $isUpdate = false;
        };

        // Save all the banners from the request
        foreach ($request->except('_token') as $key => $requestImage) {
            if ($isUpdate) {
                $file = public_path('sites/banners/' . $banner[$key]);
                if (File::exists($file)) File::delete($file);
            }
            $name = 'banner_' . uniqid() . '.' . $request->file($key)->extension();
            $request->file($key)->move(public_path('sites/banners'), $name);
            $banner[$key] = $name;
        }

        $banner->save();

        return back()->withSuccess("Banners Data Saved Successfully");
    }
}
