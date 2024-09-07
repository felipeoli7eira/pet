<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    private string $table = 'customers';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'         => '01j770ngpd57sbcnj3ptcgx7d6',
                'name'       => 'Mariana Costa',
                'email'      => 'mariana.costa@gail.com',
                'cpf'        => '12345678910',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table($this->table)->insert($data);
    }
}
