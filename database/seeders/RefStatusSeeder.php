<?php

namespace Database\Seeders;

use App\Models\RefStatus;
use Illuminate\Database\Seeder;

class RefStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefStatus::create([
            'name' => 'Pending',
        ]);

        RefStatus::create([
            'name' => 'Approved',
        ]);
    }
}
