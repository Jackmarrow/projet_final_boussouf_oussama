<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Check if $imageNames has at least one element before trying to access it
        for ($i=1; $i <12 ; $i++) { 
            # code...
            if ($i <= 8) {
                Product::create([
                    'image' => 'chair_'.$i.'.png',
                    'name' => $faker->name,
                    'price' => $faker->numberBetween(50, 150),
                    'stock' => $faker->numberBetween(1, 20),
                    'desc' => $faker->sentence(6),
                    'user_id' => 1,
                    'category_id' => 1,
                ]);
            } 
            else if($i > 8){
                Product::create([
                    'image' => 'sofa_'.$i.'.jpg',
                    'name' => $faker->name,
                    'price' => $faker->numberBetween(50, 150),
                    'stock' => $faker->numberBetween(1, 20),
                    'desc' => $faker->sentence(6),
                    'user_id' => 1,
                    'category_id' => 1,
                ]);
            }
        }

        // Product::insert([
        //     ['name'=> 'test',
        //     'price'=> 2,
        //     'stock'=> 5,
        //     'desc'=> 'hello word',
        //     'user_id'=> 1,
        //     'category_id'=> 1],

        //     ['name'=> 'test',
        //     'price'=> 2,
        //     'stock'=> 5,
        //     'desc'=> 'hello word',
        //     'user_id'=> 1,
        //     'category_id'=> 1]

        // ]);
    }
}
