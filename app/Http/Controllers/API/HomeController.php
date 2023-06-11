<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return new SiteResource(Site::find(1    ));
    }
}
