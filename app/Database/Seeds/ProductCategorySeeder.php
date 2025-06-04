<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'Lemari Pakaian',
                'harga'  => 10899000,
                'jumlah' => 5,
                'foto' => 'Lemari Pakaian.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Rak Sepatu',
                'harga'  => 6899000,
                'jumlah' => 7,
                'foto' => 'Rak Sepatu.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Lemari Boneka',
                'harga'  => 6299000,
                'jumlah' => 5,
                'foto' => 'Lemari Boneka.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product_category')->insert($item);
        }
    }
}