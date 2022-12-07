<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Expertise;


class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expertise::create(['expertise' => 'Artes plásticas']);
        Expertise::create(['expertise' => 'Teatro']);
        Expertise::create(['expertise' => 'Música']);
        Expertise::create(['expertise' => 'Danza']);
        Expertise::create(['expertise' => 'Cocina tradicional.']);
        Expertise::create(['expertise' => 'Juegos tradicionales.']);
        Expertise::create(['expertise' => 'Promoción de lectura.']);
    }
}
