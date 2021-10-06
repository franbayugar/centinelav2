<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class MachineTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machinetypes')->insert([
            'name'          => 'PC Escritorio',
            'icon'          => 'fa fa-desktop',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('machinetypes')->insert([
            'name'          => 'Notebook',
            'icon'          => 'fa fa-laptop',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('machinetypes')->insert([
            'name'          => 'Netbook',
            'icon'          => 'fa fa-laptop',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('machinetypes')->insert([
            'name'          => 'All in one',
            'icon'          => 'fa fa-desktop',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('machinetypes')->insert([
            'name'          => 'Impresora',
            'icon'          => 'fa fa-print',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

    }
}