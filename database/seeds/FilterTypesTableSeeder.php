<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filter_types')->insert([
             ['name' => 'Unidad', 'slug' => 'unidad'],
            ['name' => 'Subunidad', 'slug' => 'subnidad'],
            ['name' => 'Tipo de Servicio', 'slug' => 'tipo'],
            ['name' => 'Sector', 'slug' => 'sector'],
        ]);
    }
}
