<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
            'nombre' => 'Desarrollo Backend',
        ]);
        Area::create([
            'nombre' => 'Desarrollo Frontend',
        ]);
        Area::create([
            'nombre' => 'SQA',
        ]);
        Area::create([
            'nombre' => 'DevOps',
        ]);
    }
}
