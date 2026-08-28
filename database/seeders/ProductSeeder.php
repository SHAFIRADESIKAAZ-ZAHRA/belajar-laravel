<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $categories = Category::pluck('id', 'name'); //select name,id from products;

        $categoryNames =[
            'coffe',
            'Non Coffe',
            'Snack'
        ];

        for($i =0; $i < 50; $i++){
            $categoryName = $faker->randomElement($categoryNames);
            Product::create([
                'category_id' => $categories[$categoryName],
                'name' => $faker->words('3', true),
                'price' => $faker->numberBetween(10000, 50000),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
