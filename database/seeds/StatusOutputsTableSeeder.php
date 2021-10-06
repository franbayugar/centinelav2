<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class StatusOutputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statusoutputs')->insert([
            'name'  => 'Reservado',
            'color' => 'text-warning',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('statusoutputs')->insert([
            'name'  => 'Entregado',
            'color' => 'text-success',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('statusoutputs')->insert([
            'name'  => 'Cancelado',
            'color' => 'text-danger',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

    }
}