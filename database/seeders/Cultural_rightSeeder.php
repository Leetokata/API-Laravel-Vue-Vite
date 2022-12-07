<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cultural_right;


class Cultural_rightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cultural_right::create(['cultural' => 'Identidad y patrimonios culturales']);
        Cultural_right::create(['cultural' => 'Referencias a comunidades culturales']);
        Cultural_right::create(['cultural' => 'Acceso y participación en la vida cultural']);
        Cultural_right::create(['cultural' => 'Educación y formación']);
        Cultural_right::create(['cultural' => 'Información y comunicación']);
        Cultural_right::create(['cultural' => 'Cooperación cultural']);
    }
}
