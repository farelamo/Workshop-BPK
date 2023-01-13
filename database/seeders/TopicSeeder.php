<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run()
    {
        $names = ['Pemeriksa', 'Manajemen', 'Penunjang Pemeriksa'];
        foreach ($names as $name) {
            Topic::create([
                'name' => $name
            ]);
        }
    }
}
