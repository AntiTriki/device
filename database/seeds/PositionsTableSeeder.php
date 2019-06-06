<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Position::insert([
            [
                'name' => 'Encargado'
            ],
            [
                'name' => 'Jefe de area'
            ]
        ]);
    }
}
