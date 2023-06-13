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
        
            DB::table('products')->insert([
                'name' => 'product 1',
                'slug' => 'jdgjksdgd',
                'category_id' => '1',
                'description' => 'sdygfyshdghghbdshg',
                'short_description' => 'sdsdg',
                'price' => '12.2',
                'compare_price' => '12',
                'image' => 'image1',
                'quantity' => '15',
                'status' => 'active', 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
