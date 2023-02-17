<?php

namespace Database\Seeders;

use App\Models\Quote AS QuoteModel;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuoteModel::factory()->count(100)->create();
    }
}