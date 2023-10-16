<?php

namespace App\Http\Controllers;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'store_link' => 'required|string',
        ]);

        // Update Common
        $site = Site::findOrFail(1);
        $site->site_name = strip_tags($request->site_name);
        $site->title = strip_tags($request->title);
        $site->description = strip_tags($request->description);
        $site->address = strip_tags($request->address);
        $site->phone = strip_tags($request->phone);
        $site->email = strip_tags($request->email);
        $site->store_link = strip_tags($request->store_link);

        // Update Social
        if ($request->facebook) {
            $site->facebook = $request->facebook;
        }
        if ($request->twitter) {
            $site->twitter = $request->twitter;
        }
        if ($request->instagram) {
            $site->instagram = $request->instagram;
        }
        if ($request->youtube) {
            $site->youtube = $request->youtube;
        }
        if ($request->pinterest) {
            $site->pinterest = $request->pinterest;
        }

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
}
