<?php

use App\Category;
use App\Material;
use App\Size;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds. test
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
        for ($i = 0; $i < 100; ++$i) {
            $product_data[] = [
                'category_id' => $categories[rand(0, count($categories) - 1)]->id,
                'material_id' => $materials[rand(0, count($materials) - 1)]->id,
                'size_id' => $sizes[rand(0, count($sizes) - 1)]->id,
                'name' => ucwords($faker->words(rand(1, 3), true)),
                'price' => 1000 * rand(20, 50),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }

        DB::table('products')->insert($product_data);

    }
}
