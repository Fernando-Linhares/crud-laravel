<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Product,
    Category
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #Product::factory(20)->create();
        #Category::factory(5)->create();
        Product::create(['name'=>'Calça','price'=>80.64,'category_id'=>1]);
        Product::create(['name'=>'Jaqueta','price'=>280.99,'category_id'=>2]);
        Product::create(['name'=>'Calça','price'=>80.33,'category_id'=>1]);
        Product::create(['name'=>'Camisa','price'=>45.43,'category_id'=>3]);
        Product::create(['name'=>'Vestido','price'=>1020.12,'category_id'=>2]);
        Category::create(['name'=>'jeans']);
        Category::create(['name'=>'shoes']);
        Category::create(['name'=>'greyscap']);
    }
}
