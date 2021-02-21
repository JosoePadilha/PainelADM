<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $index){
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => Str::random(5),
                'family_id' => 1,
                'avatar' => '',
            ]);
        }
    }
}
