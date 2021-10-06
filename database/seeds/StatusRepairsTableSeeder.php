<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class StatusRepairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statusrepairs')->insert([
            'name'  => 'Pendiente',
            'color' => 'bg-yellow',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('statusrepairs')->insert([
            'name'  => 'Observando',
            'color' => 'bg-blue',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('statusrepairs')->insert([
            'name'  => 'Lista',
            'color' => 'bg-green',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('statusrepairs')->insert([
            'name'  => 'Sin arreglo',
            'color' => 'bg-red',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

    }
}