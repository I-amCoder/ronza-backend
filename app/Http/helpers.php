<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

function showAmount($amount = 0)
{
    return config('settings.currency_symbol') . round($amount, 2);
}

function activeRoute($route)
{
    if (is_array($route)) {
        if (in_array(Route::currentRouteName(), $route)) return "active";
    } else if (Route::currentRouteName() == $route)  return "active";
}
