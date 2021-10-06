<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'name'  => 'recibió',
            'icon'  => 'fa fa-reply',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
        
        DB::table('actions')->insert([
            'name'  => 'observó',
            'icon'  => 'fa fa-eye',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('actions')->insert([
            'name'  => 'reparó',
            'icon'  => 'fa fa-wrench',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('actions')->insert([
            'name'  => 'entregó',
            'icon'  => 'fa fa-mail-forward',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);


    }
}