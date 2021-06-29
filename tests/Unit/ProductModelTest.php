<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;

class ProductModelTest extends TestCase
{

    /**
     * @test
     */
    public function must_give_all_products(): void
    {
        $products = Product::all();
        $this->assertNotEmpty($products);
    }

    /**
     * @test
     */
    public function must_give_an_relationament(): void
    {
        $category = Product::all()->first()->category;
        $has_one_category  = isset($category['name']);
        $this->assertTrue($has_one_category);
    }
}
