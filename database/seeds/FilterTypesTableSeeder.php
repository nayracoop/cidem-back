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
             ['id'=> 1, 'name' => 'Unidad', 'slug' => 'unidad'],
            ['id'=> 2, 'name' => 'Subunidad', 'slug' => 'subnidad'],
            ['id'=> 3, 'name' => 'Tipo de Servicio', 'slug' => 'tipo'],
            ['id'=> 4, 'name' => 'Sector', 'slug' => 'sector'],
        ]);
    }
}
