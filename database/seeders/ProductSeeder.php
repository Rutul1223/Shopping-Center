<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
            'name'=>'Hoodie',
            "price"=>"1500",
            "description"=>" sweat cotten hoodie just wear to feel free ",
            "category"=>"Clothes",
            "gallery"=>"https://m.media-amazon.com/images/I/61zYHbMrzYL._SX569_.jpg"
            ],
            [
            'name'=>'Shirts',
            "price"=>"900",
            "description"=>" Trendy shirt ",
            "category"=>"Clothes",
            "gallery"=>"https://m.media-amazon.com/images/I/61Zr47a1zHL._SY679_.jpg"
            ],
        ]);
    }
}
