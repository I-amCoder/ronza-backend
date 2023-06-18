<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function generateUniqueSlug($title, $model, $separator = '-')
    {
        $slug = Str::slug($title, $separator);

        $count = 2;
        while ($model::where('slug', $slug)->exists()) {
            $newSlug = $slug . $separator . $count;
            $count++;

            $slug = $newSlug;
        }

        return $slug;
    }
}
