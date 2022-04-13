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
        
        \App\Models\Restaurant::create([
            "nama_restaurant" => "Nasi Padang",
            "almt_restaurant" => "Jl.Diponegoro 9",
            "no_telp" => "0812233",
        ]);
        $user = [
            [
                'username' => 'admin',
               'email'=>'admin@admin.com',
                'level'=>'1',
               'password'=> md5('admin'),
            ],
            [
                'username' => 'pemilik toko',
               'email'=>'toko@toko.com',
                'level'=>'2',
               'password'=> md5('pemiliktoko'),
            ],
            [
                'username' => 'supplier',
               'email'=>'supplier@supplier.com',
                'level'=>'3',
               'password'=> md5('supplier'),
            ],
            [
                'username' => 'kasir',
               'email'=>'kasir@kasir.com',
                'level'=>'4',
               'password'=> md5('kasir'),
            ]
        ];

        foreach ($user as $key => $value) {
            \App\Models\User::create($value);
        }
        $akun = [
            [
                'id_user' => 2,
                'id_restaurant'=>1,
            ],
            [
                'id_user' => 4,
                'id_restaurant'=>1,
            ]
        ];

        foreach ($akun as $key => $value) {
            \App\Models\AkunRestaurant::create($value);
        }
        $bahan = [
            [
                'id_restaurant'=>1,
                'nama_barang' => 'Beras',
                'qty' => 100.0,
            ],
            [
                'id_restaurant'=>1,
                'nama_barang' => 'Minyak Goreng',
                'qty' => 10.00,
            ]
        ];

        foreach ($bahan as $key => $value) {
            \App\Models\Bahan::create($value);
        }
        $bmasuk = [
            [
                'id_bahan'=>1,
                'supplier' => 'Beras',
                'total' => 1200000,
                'qty' => 1000.0,
                'tgl_masuk' => '2022-04-05',
                'tgl_pesan' => '2022-04-01',
            ],
            [
                'id_bahan'=>1,
                'supplier' => 2,
                'total' => '1000000',
                'qty' => 100.00 ,
                'tgl_masuk' => '2022-04-10',
                'tgl_pesan' => '2022-04-01',
            ]
        ];

        foreach ($bahan as $key => $value) {
            \App\Models\Bahan::create($value);
        }
    }
}
