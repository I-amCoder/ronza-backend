<?php

namespace App\Services;

use Mtownsend\RemoveBg\RemoveBg;

class RemoveBgService
{
    private $removeBg;
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('REMOVE_BG_API_KEY');
        $this->removeBg = new RemoveBg($this->apiKey);
    }

    public function removeProductBackground($path,$name)
    {
        try {
            $this->removeBg->file($path)->save(storage_path('app/public/products/images/no_bg_' . $name));
        } catch (\Exception $e) {
            // Handle the exception here
            return null;
        }
    }
}
