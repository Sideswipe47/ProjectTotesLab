<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_image_data = [];
        $products = Product::all();
        foreach ($products as $product) {
            $max = rand(0, 5);
            for ($i = 0; $i < $max; ++$i) {
                $product_image_data[] = [
                    'product_id' => $product->id,
                    'path' => rand(1, 5) . '.jpg'
                ];
            }
        }

        DB::table('product_images')->insert($product_image_data);
    }
}
