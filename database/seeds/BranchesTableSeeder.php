<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Branch::insert([
            [
                'name' => 'Irala',
                'direccion' => 'av. Irala #000'
            ],
            [
                'name' => 'Paragua',
                'direccion' => 'av. Japon #000'
            ],
            [
                'name' => 'Villa 1ro de mayo',
                'direccion' => 'Villa 1° de Mayo Calle 3 #17'
            ],
            [
                'name' => 'Rafael Peña',
                'direccion' => 'Calle Rafael Peña 236 y 250, entre Calle España y 21 de Mayo'
            ]
        ]);
    }
}
