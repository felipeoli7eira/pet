<?php

namespace Database\Seeders;

use App\Modules\Customer\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetsSeeder extends Seeder
{
    public string $table = 'pets';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'             => '01j770ramts143wqwx16saxk5j',
                'name'           => 'Bruce',
                'birth_month'    => 7,
                'birth_year'     => 2023,
                'animal_type_id' => DB::table('animal_types')->select('id')->limit(1)->first()->id,
                'customer_id'    => Customer::query()->first()->id,
                'created_at'     => date('Y-m-d H:i:s')
            ],
        ];

        DB::table($this->table)->insert($data);
    }
}
