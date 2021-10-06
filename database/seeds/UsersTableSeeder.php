<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Martín',
            'lastname'      => 'Carioni',
            'email'         => 'mcarioni@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-255',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Noelia',
            'lastname'      => 'Carrizo',
            'email'         => 'ncarrizo@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-254',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Elizabeth',
            'lastname'      => 'Rodriguez',
            'email'         => 'erodriguez@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-253',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Diego',
            'lastname'      => 'Gonzalez',
            'email'         => 'diego.computos@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-254',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Javier',
            'lastname'      => 'Gonzalez',
            'email'         => 'javier.computos@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-253',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Joel',
            'lastname'      => 'Carbonetti',
            'email'         => 'joel@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Admin',
            'phone'         => '(2983) 439-253',
            'area_id'       => 1,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Julia',
            'lastname'      => 'Svarre',
            'email'         => 'jefe.compras@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-230',
            'area_id'       => 8,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Silvia',
            'lastname'      => 'Nogueira',
            'email'         => 'shcd@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-262',
            'area_id'       => 21,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Nerina',
            'lastname'      => 'Vaini',
            'email'         => 'nerina_vaini@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => null,
            'area_id'       => 33,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Alejandro',
            'lastname'      => 'Finocchio',
            'email'         => 'alejandro@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-380',
            'area_id'       => 43,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Aldana',
            'lastname'      => 'Temperoni',
            'email'         => 'licitaciones.compras@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-229',
            'area_id'       => 8,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Andrea',
            'lastname'      => 'Veninga',
            'email'         => 'facturacion.compras@tresarroyos.com.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-231',
            'area_id'       => 8,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Carolina',
            'lastname'      => 'Aristain',
            'email'         => 'carolinaaristain@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-230',
            'area_id'       => 8,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Maria Julia',
            'lastname'      => 'D amico',
            'email'         => 'juliadamico@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-231',
            'area_id'       => 8,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Rocío',
            'lastname'      => 'Aguinaga',
            'email'         => 'aguinagarocio@yahoo.com.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) (15)-555092',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Jorge Omar',
            'lastname'      => 'D Alessandro',
            'email'         => 'contaduria2@tresa.mun.gob.gva.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-269',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Susana',
            'lastname'      => 'Lucchetti',
            'email'         => 'contaduria1@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-227',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Karina',
            'lastname'      => 'Castaño',
            'email'         => 'proveedores@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-228',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Valeria',
            'lastname'      => 'Larragneguy',
            'email'         => 'contaduria4@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-228',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Mercedes',
            'lastname'      => 'Cobanea',
            'email'         => 'subcdra@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-225',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Emiliano',
            'lastname'      => 'Zwaal',
            'email'         => 'privadas@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-208',
            'area_id'       => 34,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Monica',
            'lastname'      => 'Perilli',
            'email'         => 'registropatrimonial@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-269',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Lujan',
            'lastname'      => 'Landeyro',
            'email'         => 'lujan_landeyro@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-274',
            'area_id'       => 3,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Rocio',
            'lastname'      => 'Mustafa',
            'email'         => 'auxiliarletrada@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-242',
            'area_id'       => 3,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Eva',
            'lastname'      => 'Turienzo',
            'email'         => 'eturienzo@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-243',
            'area_id'       => 3,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Antonella',
            'lastname'      => 'Berisiartua',
            'email'         => 'rrhh@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-289',
            'area_id'       => 37,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Angelica',
            'lastname'      => 'Gonzalez',
            'email'         => 'mariangelazal@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) (15)-614461',
            'area_id'       => 23,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Zulma',
            'lastname'      => 'Vargas',
            'email'         => 'zul_vm@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-214',
            'area_id'       => 25,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Alejandra',
            'lastname'      => 'Sosa',
            'email'         => 'cultura@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 425-513',
            'area_id'       => 16,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Ana Silvia',
            'lastname'      => 'Tedeschi',
            'email'         => 'deportes_tarroyos@speedy.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 423-811',
            'area_id'       => 17,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Daiana',
            'lastname'      => 'Morales',
            'email'         => 'tesoreria@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-240',
            'area_id'       => 42,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Federico',
            'lastname'      => 'Lopez Di Fondi',
            'email'         => 'federicoagustin82@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) (15)-413339',
            'area_id'       => 38,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Roberto',
            'lastname'      => 'Fernandez',
            'email'         => 'licencias@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 432-102',
            'area_id'       => 23,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Silvia',
            'lastname'      => 'Greco',
            'email'         => 'presupuesto@tresa.mun.gba.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 432-102',
            'area_id'       => 47,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Daniela',
            'lastname'      => 'Ortega',
            'email'         => 'creditopublico@tresa.mun.gba.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-220',
            'area_id'       => 10,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Martina',
            'lastname'      => 'Cereijo',
            'email'         => 'martinacereijo@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 433-168',
            'area_id'       => 27,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Jose',
            'lastname'      => 'Irusta',
            'email'         => 'jefedespacho@tresarroyos.com.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-213',
            'area_id'       => 46,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Javier David',
            'lastname'      => 'Novosad',
            'email'         => 'javiernovosad@yahoo.com.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 490-012',
            'area_id'       => 15,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Claudia',
            'lastname'      => 'Ramos',
            'email'         => 'bromatologia@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 433-690',
            'area_id'       => 4,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Virginia',
            'lastname'      => 'Tedeschi',
            'email'         => 'faltas2@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 422-818',
            'area_id'       => 22,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Christian',
            'lastname'      => 'Duran',
            'email'         => 'molivaduran@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-204',
            'area_id'       => 9,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Jennifer',
            'lastname'      => 'Martin',
            'email'         => 'jenni.estefi.martin@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-256',
            'area_id'       => 37,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Daniela',
            'lastname'      => 'Formigo',
            'email'         => 'guias@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 425-835',
            'area_id'       => 20,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Ana Carolina',
            'lastname'      => 'Goicoechea',
            'email'         => 'prodesta@tresarroyos.gov.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-287',
            'area_id'       => 35,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Claudia Lorena',
            'lastname'      => 'Farias',
            'email'         => 'bahiano_2011@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 498-113',
            'area_id'       => 11,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Agustina',
            'lastname'      => 'Lopez',
            'email'         => 'agustinalopez_57@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 433-168',
            'area_id'       => 27,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Jonathan',
            'lastname'      => 'Cabral',
            'email'         => 'joonnii.5@hotmail.es',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) (15)-562502',
            'area_id'       => 40,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Olga',
            'lastname'      => 'Torres',
            'email'         => 'lujansierra@hotmail.com.ar',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) (15)-460817',
            'area_id'       => 21,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Analia',
            'lastname'      => 'Caviggia',
            'email'         => 'analiacaviggia@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-276',
            'area_id'       => 42,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Miguel',
            'lastname'      => 'Yitani',
            'email'         => 'miguelyitani1@gmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 433-116',
            'area_id'       => 28,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'name'          => 'Mariana',
            'lastname'      => 'Balmaceda',
            'email'         => 'mariiana.24@hotmail.com',
            'password'      => bcrypt('123456789'),
            'type'          => 'Member',
            'phone'         => '(2983) 439-212',
            'area_id'       => 46,
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);
    }
}
