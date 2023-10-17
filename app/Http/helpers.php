<?php


function showAmount($amount = 0)
{
    return config('settings.currency_symbol') . round($amount, 2);
}
