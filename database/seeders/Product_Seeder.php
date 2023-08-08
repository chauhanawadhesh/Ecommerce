<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\product;

class Product_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $product = new product;
        $product->name = $faker->name;
        $product->price = $faker->price;
        $product->category = $faker->category;
        $product->gallery = $faker->gallery;
        $product->description = $faker->description;
        $product->save();
        // DB::table('products')->insert(
        // [
        //     'name'=>'Laptop',
        //     'price'=>'44,999',
        //     'category'=>'Laptop',
        //     'gallery'=>'https://static.digit.in/default/ad94a5e50a301f843f3f86bb81319727772ada71.jpeg',
        //     'description'=>'Tech Specs Buy Finish Black, White, , Green, Blue, Purple Ceramic Shield front Glass back and aluminium design Capacity 1 64GB 128GB 256GB Size and Weight 2 Width: 71.5 mm (2.82 inches) Height: 146.7 mm (5.78 inches) Depth: 7.4 mm (0.29 inches)',
        // ]
    //);
    }
}
