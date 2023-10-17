<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $appends = ['image_path', 'logo_path'];

    public function getImagePathAttribute()
    {
        if (!is_null($this->image)) {
            return url('/sites/images/' . $this->image);
        } else {
            return null;
        }
    }
    public function getLogoPathAttribute()
    {
        if (!is_null($this->logo)) {
            return url('/sites/logos/' . $this->logo);
        } else {
            return null;
        }
    }

    public function heros()
    {
        return $this->hasMany(Hero::class);
    }
}
