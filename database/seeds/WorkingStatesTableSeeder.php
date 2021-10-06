<?php

use Illuminate\Database\Seeder;

class WorkingStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('working_states')->insert([
            'name'  => 'Pendiente',
            'color' => 'text-warning',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('working_states')->insert([
            'name'  => 'En proceso',
            'color' => 'text-info',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('working_states')->insert([
            'name'  => 'Hecho',
            'color' => 'text-success',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
    }
}
