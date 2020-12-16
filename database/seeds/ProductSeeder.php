<?php

use App\Category;
use App\Material;
use App\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Faker
        $faker = Faker\Factory::create();

        // Types
        $categories = Category::all();
        $materials = Material::all();
        $sizes = Size::all();
        
        // Seed
        $product_data = [];
        for ($i = 0; $i < 50; ++$i) {
            $product_data[] = [
                'category_id' => $categories[rand(1, count($categories))]->id,
                'material_id' => $materials[rand(1, count($materials))]->id,
                'size_id' => $sizes[rand(1, count($sizes))]->id,
                'name' => $faker->words(rand(1, 3), true),
                'price' => 1000 * rand(20, 50)
            ];
        }

        DB::table('products')->insert($product_data);

    }
}
