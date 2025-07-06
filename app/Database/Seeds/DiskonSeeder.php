<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
       $data = [
            [
                'tanggal' => "2025-07-06",
                'nominal'  => 100000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-07",
                'nominal'  => 200000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-08",
                'nominal'  => 300000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-09",
                'nominal' => 100000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-10",
                'nominal'  => 300000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-11",
                'nominal'  => 100000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-12",
                'nominal'  => 200000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-13",
                'nominal'  => 200000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-14",
                'nominal'  => 300000,
                'created_at' => "2025-07-06 15:00:00",
            ],
            [
                'tanggal' => "2025-07-15",
                'nominal'  => 100000,
                'created_at' => "2025-07-06 15:00:00",
            ]
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('diskon')->insert($item);
        }
    }
}
