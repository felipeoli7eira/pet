<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    private string $table = 'users';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'           => '01j770mm6bgdj4qvewtzpx96k7',
                'name'         => 'Dr. Carlos Chagas',
                'email'        => 'carlos.chagas@petapp.com',
                'doctor'       => true,
                'receptionist' => false,
                'created_at'   => date('Y-m-d H:i:s')
            ],
            [
                'id'           => '01j770mpjf0dbqv9mb4eb58rzy',
                'name'         => 'Alice',
                'email'        => 'alice@petapp.com',
                'receptionist' => true,
                'doctor'       => false,
                'created_at'   => date('Y-m-d H:i:s')
            ],
        ];

        $data = array_map(function($each) {
            $each['password'] = Hash::make('12345678');
            return $each;
        }, $data);

        DB::table($this->table)->insert($data);
    }
}
