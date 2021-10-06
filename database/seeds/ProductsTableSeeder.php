<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'          => 'Camara Web PC (Genius)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Camara Web utilizada para video-conferencias por aplicaciones tipo Skype.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'CD-R (Teltron)',
            'stock'         => 29,
            'image'         => null,
            'description'   => 'CD-R de 700 Mb. utilizado para grabar distintos tipos de archivos.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Disco Rigido 1TB (Western Digital)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Disco Rigido de 1 TB. WD10EZEX. Utilizado para almacenamiento interno de computadoras.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Disco Rigido 500 Gb (Western Digital)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Disco Rigido de 500 Gb. WD500AAKX. Utilizado para almacenamiento interno de computadoras.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'DVD-R (Verbatim)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'DVD-R de 4.7 Gb. utilizado para grabar distintos tipos de archivos.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Fuente ATX (Over)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Fuentes de alimentación para abastecer de corriente a computadoras.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Micrófono PC (Nisuta)',
            'stock'         => 2,
            'image'         => null,
            'description'   => 'Micrófono PC utilizado para hablar por aplicaciones ejemplo Skype, Raidcall, etc.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Mouse USB (PCBOX)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Dispositivo apuntador utilizado para facilitar el manejo de un entorno gráfico en una computadora.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Parlantes PC (PCBOX)',
            'stock'         => 11,
            'image'         => null,
            'description'   => 'Parlantes de PC para reproducir contenido multimedia.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Resma Papel A4 (Report)',
            'stock'         => 21,
            'image'         => null,
            'description'   => 'Resma de papel A4 utilizado para imprimir cualquier tipo de documento.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Resma Papel Oficio (Report)',
            'stock'         => 6,
            'image'         => null,
            'description'   => 'Resma de papel oficio/legal utilizado para la impresión de distintos tipos de documentos.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Resma Papel Recibos (Troquelado)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Resma de papel troquelado utilizado para la impresión de las distintas tazas de servicios.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Teclado USB (PCBOX)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Teclado USB utilizado para la entrada de datos a una computadora.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Teléfono Celular (Microsoft Lumia 640 XL)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Teléfono celular Microsoft Lumia 640 XL 4G LTE.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Teléfono fijo (Panasonic)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Sistema telefónico integrado. Marca Panasonic KX-TS500AG.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 83A (CARTRIDGE)',
            'stock'         => 9,
            'image'         => null,
            'description'   => 'H-JL PRO MFP /127FN /FW / M202DW M225DN / DW / RDN / M202N / M201DW / N.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 12A (DGM)',
            'stock'         => 29,
            'image'         => null,
            'description'   => 'Tóner 12A Negro utilizado para las impresoras HP Laserjet 1010 / 1012 / 1015 / 1018 / 1020 / 1022.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 255A (GTC Ribbon)',
            'stock'         => 9,
            'image'         => null,
            'description'   => 'Tóner 255A Negro utilizado para las impresoras HP Laserjet P3015.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 255X (GTC Ribbon)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Utilizado para las impresoras HP Laserjet P3015 (Rinde más que un tóner 255A).',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 26A (DGM)',
            'stock'         => 36,
            'image'         => null,
            'description'   => 'Tóner 26A utilizado para las impresoras M402dn / M426.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 310A/350A (GTC Ribbon)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner Negro utilizado en H-CP 1025NW.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 311A/351A (GTC Ribbon)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner Cyan utilizado en H-CP 1025NW.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 312A/352A (GTC Ribbon)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner Amarillo utilizado en H-CP 1025NW.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 313A/353A (GTC Ribbon)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner Magenta utilizado en H-CP 1025NW.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 3400H BK (Laser Toner Cartridge)',
            'stock'         => 2,
            'image'         => null,
            'description'   => 'Utilizada en impresoras 3400 / 3410 / 3410N (Ricoh RSP 3500 de RRHH).',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 35A/36A/85A (GTC Ribbon)',
            'stock'         => 30,
            'image'         => null,
            'description'   => 'Tóner 35A/36A/85A Negro utilizado en impresoras HP Laserjet P1005 / P1006 / P1100 / P1102.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 410A (DGM)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner 410A Negro utilizado para las impresoras HP LaserJet M375nw / M47dn.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 411A (DGM)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner 411A Cyan utilizado para las impresoras HP LaserJet M375nw / M47dn.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 412A (DGM)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner 412A Amarillo utilizado para las impresoras HP LaserJet M375nw / M47dn.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 413A (DGM)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Tóner 413A Magenta utilizado para las impresoras HP LaserJet M375nw / M47dn.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 505A/80A (GTC Ribbon)',
            'stock'         => 8,
            'image'         => null,
            'description'   => 'Tóner 505A/80A Negro utilizado para las impresoras HP Laserjet P2035 / P2050 / P2055. HP Laserjet Pro 400 M401 / M401 / M401 / MFP M425.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 505X/80X (GTC Ribbon)',
            'stock'         => 3,
            'image'         => null,
            'description'   => 'Utilizado para las impresoras P3015 (Rinde más que un tóner 505A/80A).',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 53A/49A (GTC Ribbon)',
            'stock'         => 0,
            'image'         => null,
            'description'   => 'Utilizados para impresoras HP laserjet 2015.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 53X/49X (GTC Ribbon)',
            'stock'         => 1,
            'image'         => null,
            'description'   => 'Utilizado para impresora HP Laserjet 2015 (Rinde un poco más que un tóner 53A / 49A).',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 540A (DGM)',
            'stock'         => 6,
            'image'         => null,
            'description'   => 'Tóner 540A Negro utilizado para las impresoras HP Laserjet CP1215.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 541A (DGM)',
            'stock'         => 8,
            'image'         => null,
            'description'   => 'Tóner 541A Cyan utilizado para las impresoras HP Laserjet CP1215.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 542A (DGM)',
            'stock'         => 6,
            'image'         => null,
            'description'   => 'Tóner 542A Amarillo utilizado para las impresoras HP Laserjet CP1215.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 543A (DGM)',
            'stock'         => 7,
            'image'         => null,
            'description'   => 'Tóner 543A Magenta utilizado para las impresoras HP Laserjet CP1215.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner 79A (DGM)',
            'stock'         => 23,
            'image'         => null,
            'description'   => 'Tóner utilizado para las imresoras HP Laserjet Pro M12 / MFP M26.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner CE400A (GTC Ribbon)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Tóner Negro para impresora Emiliano Monsalvo.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner CE401A (GTC Ribbon)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Tóner Cyan para impresora Emiliano Monsalvo.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner CE402A (GTC Ribbon)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Tóner Amarillo para impresora Emiliano Monsalvo.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

        DB::table('products')->insert([
            'name'          => 'Tóner CE403A (GTC Ribbon)',
            'stock'         => 5,
            'image'         => null,
            'description'   => 'Tóner Magenta para impresora de Emiliano Monsalvo.',
            'created_at'    => date("Y-m-d H:i:s"),
            'updated_at'    => date("Y-m-d H:i:s")
        ]);

    }
}