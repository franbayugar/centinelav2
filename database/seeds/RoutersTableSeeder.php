<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Crypt;

class RoutersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routers')->insert([
            'name'          => 'Tesorería',
            'password'      => Crypt::encrypt('Teso2017Mun'),
            'description'   => Crypt::encrypt('<p><strong>MAC:</strong>&nbsp;D4:CA:6D:0F:77:7F</p>

            <p>administer</p>
            
            <p>MkMuniCelta17</p>'),
            'area_id'       => 42,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

    }
}