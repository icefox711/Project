<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User Seeder
       $dataUser = [
        [
        'name' => 'bank',
        'email' => 'bank@gmail.com',
        'role'=> 'bank',
        'password' => bcrypt ('bank'),
        'remember_token' => Str::random(10),
        ],
        [
        'name' => 'kantin',
        'email' => 'kantin@gmail.com',
        'role'=> 'kantin',
        'password' => bcrypt ('kantin'),
        'remember_token' => Str::random(10),
        ],
        [
        'name' => 'customer',
        'email' => 'customer@gmail.com',
        'role'=> 'customer',
        'password' => bcrypt ('customer'),
        'remember_token' => Str::random(10),
        ],
    ];
    foreach ($dataUser as $key => $val) {
        User::create($val);
    }

    $dataKategori =[
        [
            'nama_kategori' => 'Makanan',
        ],
        [
            'nama_kategori'=> 'Minuman',
        ],
    ];
    foreach ($dataKategori as $key => $val) {
        Kategori::create($val);
    }

    $dataProduk = [
        [
            'nama_produk' => 'Vit',
            'harga' => 3000,
            'stok' => 10,
            'foto' => 'default.png',
            'desc'=> 'minuman mineral',
            'id_kategori' => 1,
        ],
        [
            'nama_produk' => 'Mie Ayam',
            'harga' => 10000,
            'stok' => 10,
            'foto' => 'default.png',
            'desc'=> 'ayam pake mie',
            'id_kategori' => 2,  
        ]
    ];
    foreach ($dataProduk as $key => $val) {
        Produk::create($val);
    }

    $dataWallet = [
        [
            'rekening' => '641234567890',
            'id_user' => 1,
            'saldo' => 100000,
            'status' => 'aktif'
        ],
        [
            'rekening' => '642345678091',
            'id_user' => 2,
            'saldo' => 100000,
            'status' => 'aktif'
        ],
        [
            'rekening' => '643456789012',
            'id_user' => 3,
            'saldo' => 100000,
            'status' => 'aktif'
        ],
    ];

    foreach ($dataWallet as $key => $val) {
        Wallet::create($val);
    }
    }
}
