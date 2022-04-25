<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        
    
        $user = [
            [
                'username' => 'admin',
                'id_profile' => '1',
               'password'=> md5('admin'),
               'level'=>'1',
            ],
            [
                'username' => 'restaurant',
                'id_profile' => '2',
               'password'=> md5('restaurant'),
                'level'=>'2',
            ],
            [
                'username' => 'supplier1',
                'id_profile' => '3',
               'password'=> md5('supplier1'),
               'level'=>'3',
            ],
            [
                'username' => 'supplier2',
                'id_profile' => '4',
               'password'=> md5('supplier2'),
               'level'=>'3',
            ],
            [
                'username' => 'supplier3',
                'id_profile' => '5',
               'password'=> md5('supplier3'),
               'level'=>'3',
            ]
        ];

        foreach ($user as $key => $value) {
            \App\Models\Profile::create($value);
        }
        $bahan = [
            [
                'id_profile'=>2,
                'nama_barang' => 'Beras',
                'qty' => 100.0,
                'status' => 1,
            ],
            [
                'id_profile'=>2,
                'nama_barang' => 'Minyak Goreng',
                'qty' => 10.00,
                'status' => 1,
            ]
        ];

        foreach ($bahan as $key => $value) {
            \App\Models\Bahan::create($value);
        }
    }
}
