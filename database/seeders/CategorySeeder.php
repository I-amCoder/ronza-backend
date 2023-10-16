<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Socks',
                'title' => 'New Socks',
                'slug' => 'new-socks'
            ],
            [
                'name' => 'Bagpack',
                'title' => 'New Bagpack',
                'slug' => 'new-bagpack'
            ],
            [
                'name' => 'Shoulder Bag',
                'title' => 'New Shoulder Bag',
                'slug' => 'new-shoulder-bag'
            ],
            [
                'name' => 'Bagorganizser',
                'title' => 'New Bagorganizser',
                'slug' => 'new-bagorganizser'
            ],
            [
                'name' => 'Grill',
                'title' => 'New Grill',
                'slug' => 'new-grill'
            ],
            [
                'name' => 'Hiking',
                'title' => 'New Hiking',
                'slug' => 'new-hiking'
            ],
            [
                'name' => 'Car',
                'title' => 'New Car',
                'slug' => 'new-Car'
            ],
            [
                'name' => 'Car',
                'title' => 'New Car',
                'slug' => 'new-Car'
            ],
            [
                'name' => 'Toothholder',
                'title' => 'New Toothholder',
                'slug' => 'new-Toothholder'
            ],
            [
                'name' => 'Kitchen',
                'title' => 'New Kitchen',
                'slug' => 'new-Kitchen'
            ],
            [
                'name' => 'Clock',
                'title' => 'New Clock',
                'slug' => 'new-Clock'
            ],
            [
                'name' => 'Solar',
                'title' => 'New Solar',
                'slug' => 'new-Solar'
            ],
            [
                'name' => 'Phone Support',
                'title' => 'New Phone Support',
                'slug' => 'new-Phone-Support'
            ],
            [
                'name' => 'Motor',
                'title' => 'New Motor',
                'slug' => 'new-Motor'
            ],
            [
                'name' => 'Humidifier',
                'title' => 'New Humidifier',
                'slug' => 'new-Humidifier'
            ],
            [
                'name' => 'Aroma',
                'title' => 'New Aroma',
                'slug' => 'new-Aroma'
            ],
            [
                'name' => 'Projector',
                'title' => 'New Projector',
                'slug' => 'new-Projector'
            ],
            [
                'name' => 'Nightlight',
                'title' => 'New Nightlight',
                'slug' => 'new-Nightlight'
            ],
            [
                'name' => 'Table Lamp',
                'title' => 'New Table Lamp',
                'slug' => 'new-Table-amp'
            ],
            [
                'name' => 'Trashbin',
                'title' => 'New Trashbin',
                'slug' => 'new-Trashbin'
            ],
            [
                'name' => 'Laptop Desk',
                'title' => 'New Laptop Desk',
                'slug' => 'new-Laptop-Desk'
            ],
            [
                'name' => 'Lap Cooling Pad',
                'title' => 'New Lap Cooling Pad',
                'slug' => 'new-Lap-Cooling-Pad'
            ],
            [
                'name' => 'Lapstand',
                'title' => 'New Lapstand',
                'slug' => 'new-Lapstand'
            ],
            [
                'name' => 'POS Stand',
                'title' => 'New POS Stand',
                'slug' => 'new-POS-Stand'
            ],
            [
                'name' => 'Phone Stand',
                'title' => 'New Phone Stand',
                'slug' => 'new-Phone-Stand'
            ],
            [
                'name' => 'MT Bycycle',
                'title' => 'New MT Bycycle',
                'slug' => 'new-MT-Bycycle'
            ],
            [
                'name' => 'Smartwatch',
                'title' => 'New Smartwatch',
                'slug' => 'new-smartwatch'
            ],
        ];

        foreach($data as $item){
            Category::create($item);
        }
    }
}
