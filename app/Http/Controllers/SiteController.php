<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
}
