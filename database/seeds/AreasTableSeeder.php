<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Area::insert([
            [
                'name' => 'Ventas'
            ],
            [
                'name' => 'Retail'
            ]
        ]);
    }
}
