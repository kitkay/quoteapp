<?php

namespace Database\Seeders;

use App\Models\Quote as ModelsQuote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Quote extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsQuote::factory(100)->create();
    }
}