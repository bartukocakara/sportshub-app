<?php

namespace Database\Seeders\Request;

use App\Models\RequestReceiver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestReceiver::factory(300)->create();
    }
}
