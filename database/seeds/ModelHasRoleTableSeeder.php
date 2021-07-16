<?php

use Illuminate\Database\Seeder;

class ModelHasRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_role')->delete();
        
        \DB::table('model_has_role')->insert(array (
            0 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1199,
                'created_at' => '2020-08-24 02:07:43',
                'updated_at' => '2020-08-24 02:07:43',
            ),
            1 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1202,
                'created_at' => '2020-08-24 02:44:43',
                'updated_at' => '2020-08-24 02:44:43',
            ),
            2 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1217,
                'created_at' => '2020-11-26 14:20:11',
                'updated_at' => '2020-11-26 14:20:11',
            ),
            3 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1275,
                'created_at' => '2020-09-05 05:58:11',
                'updated_at' => '2020-09-05 05:58:11',
            ),
            4 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1350,
                'created_at' => '2020-09-08 08:37:02',
                'updated_at' => '2020-09-08 08:37:02',
            ),
            5 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1208,
                'created_at' => '2020-08-24 03:49:43',
                'updated_at' => '2020-08-24 03:49:43',
            ),
            6 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1617,
                'created_at' => '2020-11-10 01:13:57',
                'updated_at' => '2020-11-10 01:13:57',
            ),
            7 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1618,
                'created_at' => '2020-11-10 01:17:36',
                'updated_at' => '2020-11-10 01:17:36',
            ),
            8 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1619,
                'created_at' => '2020-11-10 01:17:43',
                'updated_at' => '2020-11-10 01:17:43',
            ),
            9 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1625,
                'created_at' => '2020-11-10 01:27:13',
                'updated_at' => '2020-11-10 01:27:13',
            ),
            10 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1626,
                'created_at' => '2020-11-10 01:27:21',
                'updated_at' => '2020-11-10 01:27:21',
            ),
            11 => 
            array (
                'role_id' => 4,
                'model_type' => 'App\\User',
                'model_id' => 1617,
                'created_at' => '2020-11-10 01:13:57',
                'updated_at' => '2020-11-10 01:13:57',
            ),
            12 => 
            array (
                'role_id' => 4,
                'model_type' => 'App\\User',
                'model_id' => 1618,
                'created_at' => '2020-11-10 01:17:36',
                'updated_at' => '2020-11-10 01:17:36',
            ),
            13 => 
            array (
                'role_id' => 5,
                'model_type' => 'App\\User',
                'model_id' => 1619,
                'created_at' => '2020-11-10 01:17:43',
                'updated_at' => '2020-11-10 01:17:43',
            ),
            14 => 
            array (
                'role_id' => 5,
                'model_type' => 'App\\User',
                'model_id' => 1625,
                'created_at' => '2020-11-10 01:27:13',
                'updated_at' => '2020-11-10 01:27:13',
            ),
            15 => 
            array (
                'role_id' => 6,
                'model_type' => 'App\\User',
                'model_id' => 1626,
                'created_at' => '2020-11-10 01:27:21',
                'updated_at' => '2020-11-10 01:27:21',
            ),
            16 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1210,
                'created_at' => '2020-08-24 04:01:07',
                'updated_at' => '2020-08-24 04:01:07',
            ),
            17 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1211,
                'created_at' => '2020-10-06 08:15:32',
                'updated_at' => '2020-10-06 08:15:32',
            ),
            18 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1213,
                'created_at' => '2020-10-06 08:15:40',
                'updated_at' => '2020-10-06 08:15:40',
            ),
            19 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1217,
                'created_at' => '2020-08-29 17:59:22',
                'updated_at' => '2020-08-29 17:59:22',
            ),
            20 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1277,
                'created_at' => '2020-10-06 08:16:06',
                'updated_at' => '2020-10-06 08:16:06',
            ),
            21 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1280,
                'created_at' => '2020-10-06 08:16:24',
                'updated_at' => '2020-10-06 08:16:24',
            ),
            22 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1282,
                'created_at' => '2020-10-06 08:16:35',
                'updated_at' => '2020-10-06 08:16:35',
            ),
            23 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1284,
                'created_at' => '2020-09-05 06:09:46',
                'updated_at' => '2020-09-05 06:09:46',
            ),
            24 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1298,
                'created_at' => '2020-10-06 08:17:22',
                'updated_at' => '2020-10-06 08:17:22',
            ),
            25 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1348,
                'created_at' => '2020-10-06 08:18:29',
                'updated_at' => '2020-10-06 08:18:29',
            ),
            26 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1350,
                'created_at' => '2020-09-08 08:37:02',
                'updated_at' => '2020-09-08 08:37:02',
            ),
            27 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1358,
                'created_at' => '2020-10-06 08:18:34',
                'updated_at' => '2020-10-06 08:18:34',
            ),
            28 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\User',
                'model_id' => 1955,
                'created_at' => '2020-12-21 12:21:21',
                'updated_at' => '2020-12-21 12:21:23',
            ),
            29 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1202,
                'created_at' => '2020-08-24 02:44:43',
                'updated_at' => '2020-08-24 02:44:43',
            ),
            30 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1207,
                'created_at' => '2020-10-06 08:15:00',
                'updated_at' => '2020-10-06 08:15:00',
            ),
            31 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1211,
                'created_at' => '2020-10-06 08:15:32',
                'updated_at' => '2020-10-06 08:15:32',
            ),
            32 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1212,
                'created_at' => '2020-09-07 03:09:22',
                'updated_at' => '2020-09-07 03:09:22',
            ),
            33 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1274,
                'created_at' => '2020-10-06 08:15:53',
                'updated_at' => '2020-10-06 08:15:53',
            ),
            34 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1275,
                'created_at' => '2020-09-05 05:58:11',
                'updated_at' => '2020-09-05 05:58:11',
            ),
            35 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1278,
                'created_at' => '2020-10-06 08:16:12',
                'updated_at' => '2020-10-06 08:16:12',
            ),
            36 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1285,
                'created_at' => '2020-09-05 06:13:26',
                'updated_at' => '2020-09-05 06:13:26',
            ),
            37 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1296,
                'created_at' => '2020-10-06 08:16:55',
                'updated_at' => '2020-10-06 08:16:55',
            ),
            38 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1297,
                'created_at' => '2020-10-06 08:17:00',
                'updated_at' => '2020-10-06 08:17:00',
            ),
            39 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1300,
                'created_at' => '2020-10-06 08:17:47',
                'updated_at' => '2020-10-06 08:17:47',
            ),
            40 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1359,
                'created_at' => '2020-10-06 08:18:40',
                'updated_at' => '2020-10-06 08:18:40',
            ),
            41 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 1956,
                'created_at' => '2020-12-21 12:26:10',
                'updated_at' => '2020-12-21 12:26:13',
            ),
            42 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1247,
                'created_at' => '2020-08-29 17:59:44',
                'updated_at' => '2020-08-29 17:59:44',
            ),
            43 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1276,
                'created_at' => '2020-10-06 08:15:59',
                'updated_at' => '2020-10-06 08:15:59',
            ),
            44 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1279,
                'created_at' => '2020-10-06 08:16:18',
                'updated_at' => '2020-10-06 08:16:18',
            ),
            45 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1281,
                'created_at' => '2020-10-08 14:21:39',
                'updated_at' => '2020-10-08 14:21:39',
            ),
            46 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1283,
                'created_at' => '2020-11-02 16:10:12',
                'updated_at' => '2020-11-02 16:10:12',
            ),
            47 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1286,
                'created_at' => '2020-09-05 06:15:58',
                'updated_at' => '2020-09-05 06:15:58',
            ),
            48 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1361,
                'created_at' => '2020-10-06 08:18:51',
                'updated_at' => '2020-10-06 08:18:51',
            ),
            49 => 
            array (
                'role_id' => 9,
                'model_type' => 'App\\User',
                'model_id' => 1956,
                'created_at' => '2020-12-21 12:28:46',
                'updated_at' => '2020-12-21 12:28:48',
            ),
            50 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1201,
                'created_at' => '2020-08-24 02:46:48',
                'updated_at' => '2020-08-24 02:46:48',
            ),
            51 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1205,
                'created_at' => '2020-08-29 17:58:59',
                'updated_at' => '2020-08-29 17:58:59',
            ),
            52 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1206,
                'created_at' => '2020-10-06 08:14:44',
                'updated_at' => '2020-10-06 08:14:44',
            ),
            53 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1209,
                'created_at' => '2020-10-06 08:15:23',
                'updated_at' => '2020-10-06 08:15:23',
            ),
            54 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1211,
                'created_at' => '2020-10-06 08:15:32',
                'updated_at' => '2020-10-06 08:15:32',
            ),
            55 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1276,
                'created_at' => '2020-10-06 08:15:59',
                'updated_at' => '2020-10-06 08:15:59',
            ),
            56 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1279,
                'created_at' => '2020-10-06 08:16:18',
                'updated_at' => '2020-10-06 08:16:18',
            ),
            57 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1286,
                'created_at' => '2020-09-05 06:15:58',
                'updated_at' => '2020-09-05 06:15:58',
            ),
            58 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1299,
                'created_at' => '2020-10-06 08:17:39',
                'updated_at' => '2020-10-06 08:17:39',
            ),
            59 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1301,
                'created_at' => '2020-10-06 08:17:53',
                'updated_at' => '2020-10-06 08:17:53',
            ),
            60 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1346,
                'created_at' => '2020-10-06 08:18:23',
                'updated_at' => '2020-10-06 08:18:23',
            ),
            61 => 
            array (
                'role_id' => 10,
                'model_type' => 'App\\User',
                'model_id' => 1360,
                'created_at' => '2020-10-06 08:18:46',
                'updated_at' => '2020-10-06 08:18:46',
            ),
            62 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\User',
                'model_id' => 1199,
                'created_at' => '2020-08-24 02:07:43',
                'updated_at' => '2020-08-24 02:07:43',
            ),
            63 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\User',
                'model_id' => 1200,
                'created_at' => '2020-08-24 02:25:24',
                'updated_at' => '2020-08-24 02:25:24',
            ),
            64 => 
            array (
                'role_id' => 11,
                'model_type' => 'App\\User',
                'model_id' => 1211,
                'created_at' => '2020-10-06 08:15:32',
                'updated_at' => '2020-10-06 08:15:32',
            ),
        ));
        
        
    }
}