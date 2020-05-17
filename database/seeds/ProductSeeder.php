<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'HD800',
            'brand' => 'Sennheiser',
            'price' => 1500,
            'description' => 'Lorem ispym...',
            'image' => 'something',
            'created_at' => now()
        ]);
    }
}
