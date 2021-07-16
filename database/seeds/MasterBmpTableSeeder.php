<?php

use Illuminate\Database\Seeder;

class MasterBmpTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_bmp')->delete();
        
        \DB::table('master_bmp')->insert(array (
            0 => 
            array (
                'id' => 1,
                'elemen_id' => 2,
                'code' => 'KALP-1',
                'component' => 'EARTH BANK/ PERIMETER DIKE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'elemen_id' => 2,
                'code' => 'KALP-2',
                'component' => 'DIVERSION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'elemen_id' => 2,
                'code' => 'KALP-3',
            'component' => 'LINED WATERWAY (ROCK MATERIALS)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'elemen_id' => 2,
                'code' => 'KALP-4',
                'component' => 'CATCH DRAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'elemen_id' => 2,
                'code' => 'KALP-5',
                'component' => 'CASCADING DRAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'elemen_id' => 2,
                'code' => 'KALP-6',
                'component' => 'RIPRAP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'elemen_id' => 2,
                'code' => 'KALP-7',
            'component' => 'CHECK DAM(CD)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'elemen_id' => 2,
                'code' => 'KALP-8',
                'component' => 'TEMPORARY INTERCEPTOR DYKE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'elemen_id' => 2,
                'code' => 'KALP-9',
                'component' => 'SWALE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'elemen_id' => 2,
                'code' => 'KALP-10',
                'component' => 'TEMPORARY AND PERMANENT PIPE SLOPE DRAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'elemen_id' => 2,
                'code' => 'KALP-11',
                'component' => 'ROCK OUTLET PROTECTION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'elemen_id' => 2,
                'code' => 'KALP-12',
                'component' => 'SAND BAG BARRIER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'elemen_id' => 2,
                'code' => 'KALP-13',
                'component' => 'STORM DRAIN INLET PROTECTION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'elemen_id' => 3,
                'code' => 'KH-1',
                'component' => 'EARTH BANK/ PERIMETER DIKE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'elemen_id' => 3,
                'code' => 'KH-2',
                'component' => 'REVEGETATION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'elemen_id' => 3,
                'code' => 'KH-3',
                'component' => 'HYDROSEEDING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'elemen_id' => 3,
                'code' => 'KH-4',
                'component' => 'RIP-RAP SLOPE AND CHANNEL PROTECTION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'elemen_id' => 3,
                'code' => 'KH-5',
                'component' => 'GEO TEXTGEO TEXTILE COVERILE COVER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'elemen_id' => 3,
                'code' => 'KH-6',
                'component' => 'EROSION CONTROL BLANKET/MAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'elemen_id' => 3,
                'code' => 'KH-7',
                'component' => 'SURFACE ROUGHENING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'elemen_id' => 5,
                'code' => 'KLL-1',
                'component' => 'CONSTRUCTION FENCE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'elemen_id' => 5,
                'code' => 'KLL-2',
                'component' => 'LIMITS OF CONSTRUCTION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'elemen_id' => 5,
                'code' => 'KLL-3',
                'component' => 'CONCRETE WASHOUT AREA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'elemen_id' => 5,
                'code' => 'KLL-4',
                'component' => 'VEHICLE AND EQUIPMENT FUELING AND MAINTENANCE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'elemen_id' => 5,
                'code' => 'KLL-5',
                'component' => 'SOLID WASTE MANAGEMENT AREA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'elemen_id' => 5,
                'code' => 'KLL-6',
                'component' => 'SPOIL MANAGEMENT AREA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'elemen_id' => 5,
                'code' => 'KLL-7',
                'component' => 'STABILIZED STAGING AREA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'elemen_id' => 5,
                'code' => 'KLL-8',
                'component' => 'SCHEDULE WASTE MANAGEMENT AREA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'elemen_id' => 5,
                'code' => 'KLL-9',
                'component' => 'MATERIAL STORAGE CONTROL AND STOCKPILE MANAGEMENT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'elemen_id' => 5,
                'code' => 'KLL-10',
                'component' => 'SANITARY WASTE MANAGEMENT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'elemen_id' => 5,
                'code' => 'KLL-11',
                'component' => 'SPILL PREVENTION AND SECONDARY CONTAINMENT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'elemen_id' => 5,
                'code' => 'KLL-12',
                'component' => 'DUST CONTROL & STREET CLEANING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'elemen_id' => 4,
                'code' => 'KS-1',
                'component' => 'SEDIMENT TRAP/BASIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'elemen_id' => 4,
                'code' => 'KS-2',
                'component' => 'CONSTRUCTION ENTRANCE STABILIZATION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'elemen_id' => 4,
                'code' => 'KS-3',
            'component' => 'CONSTRUCTION ROAD STABILIZATION (GRAVELLING)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'elemen_id' => 4,
                'code' => 'KS-4',
                'component' => 'FIBER ROLLS, COIR LOG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'elemen_id' => 4,
                'code' => 'KS-4',
                'component' => 'WATTLING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'elemen_id' => 4,
                'code' => 'KS-5',
                'component' => 'SILT FENCE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}