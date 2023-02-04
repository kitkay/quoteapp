<?php

namespace Database\Seeders;

use App\Models\Quote as ModelsQuote;
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
        ModelsQuote::factory()->count(100)->create();
    }
}