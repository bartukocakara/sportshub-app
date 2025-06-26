<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_providers')->insert([
            'key' => 'iyzico',
            'name' => 'Iyzico',
            'credentials' => json_encode([
                'api_key' => 'test_iyzico_key',
                'secret' => 'test_iyzico_secret',
            ]),
            'active' => true,
        ]);
    }
}
