<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $index) {
            DB::table('clients')->insert([
                'name' => Str::random(10),
                'status' => 'Ativo',
                'avatar' => '',
                'socialReason' => Str::random(10),
                'cnpj' => Str::random(10),
                'phone' => Str::random(10),
                'celPhone' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'city' => 'Torres',
                'state' => 'Rio Grande do Sul',
                'neighborhood' => 'Centro',
                'number' => Str::random(5),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
