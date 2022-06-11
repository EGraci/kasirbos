<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\User;
use App\Models\Profile;
use App\Models\Berat;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $id_user = ['table' => 'user', 'length' => 10, 'prefix' => 'U', 'field' => 'id_user'];

        for($i = 0; $i < 5; $i++) {
            $id = IdGenerator::generate($id_user);
            switch($i){
                case 0:
                    $value = [
                        'id_user' => $id,
                        'email' => 'admin',
                       'password'=> md5('admin'),
                       'level'=>'1',
                    ];
                    break;
                case 1:
                    $value = [
                        'id_user' => $id,
                        'id_profile' => "P000000001",
                        'email' => 'restaurant',
                        'password'=> md5('restaurant'),
                        'level'=>'2',
                    ];
                    break;
                case 2:
                    $value = [
                        'id_user' => $id,
                        'id_profile' => "P000000002",
                        'email' => 'supplier1',
                        'password'=> md5('supplier1'),
                        'level'=>'3',
                    ];
                    break;
                 case 3:
                    $value = [
                        'id_user' => $id,
                        'id_profile' => "P000000003",
                        'email' => 'supplier2',
                        'password'=> md5('supplier2'),
                        'level'=>'3',
                    ];
                    break;
                 case 4:
                    $value = [
                        'id_user' => $id,
                        'id_profile' => "P000000004",
                        'email' => 'supplier3',
                        'password'=> md5('supplier3'),
                        'level'=>'3',
                    ];
                    break;
            }
            User::create($value);
        }

        $id_profile = ['table' => 'profile', 'length' => 10, 'prefix' => 'P', 'field' => 'id_profile'];

        for($i = 0; $i < 4; $i++) {
            $id = IdGenerator::generate($id_profile);
            switch($i){
                case 0:
                    $value = [
                        'id_profile' => $id,
                        'nama_pemilik' => 'restaurant',
                       'nama_usaha'=> 'restaurant',
                       'alamat_usaha'=>'resturant',
                       'telepon'=>'08123456789',
                    ];
                    break;
                case 1:
                    $value = [
                        'id_profile' => $id,
                        'nama_pemilik' => 'supplier1',
                       'nama_usaha'=> 'supplier1',
                       'alamat_usaha'=>'supplier1',
                       'telepon'=>'08123456789',
                    ];
                    break;
                case 2:
                    $value = [
                        'id_profile' => $id,
                        'nama_pemilik' => 'supplier2',
                       'nama_usaha'=> 'supplier2',
                       'alamat_usaha'=>'supplier2',
                       'telepon'=>'08123456789',
                    ];
                    break;
                 case 3:
                    $value = [
                        'id_profile' => $id,
                        'nama_pemilik' => 'supplier3',
                       'nama_usaha'=> 'supplier3',
                       'alamat_usaha'=>'supplier3',
                       'telepon'=>'08123456789',
                    ];
                    break;
            }
            Profile::create($value);
        }

        $berat = [
            [
                'berat' => 'Gram',
                'gram' => 1,
            ],
            [
                'berat' => 'Kg',
                'gram' => 1000,
            ],
            [
                'berat' => 'Liter',
                'gram' => 1000,
            ],
            [
                'berat' => 'Ton',
                'gram' => 907185,
            ],
        ];

        foreach($berat as $value) {
            Berat::create($value);
        }
    }
}
