<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TargetAudience;

class TargetAudienceSeeder extends Seeder
{
    public function run()
    {
        $names = ['All', 'Pemeriksa', 'Non-Pemeriksa'];
        foreach ($names as $name) {
            TargetAudience::create([
                'name' => $name
            ]);
        }
    }
}
