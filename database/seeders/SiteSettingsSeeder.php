<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'site_name' => 'name',
            'email' => 'name',
            'phone' => 'name',
            'logo' => 'name',
            'image' => 'name',
            'address' => 'name',
            'title' => 'name',
            'store_link' => 'name',
            'description' => 'name',
        ]);
    }
}
