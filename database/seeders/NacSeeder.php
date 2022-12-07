<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nac;


class NacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nac::create(['nac' => 'ALCALÁ']);
        Nac::create(['nac' => 'ANDALUCÍA']);
        Nac::create(['nac' => 'ANSERMANUEVO']);
        Nac::create(['nac' => 'ARGELIA']);
        Nac::create(['nac' => 'BOLÍVAR']);
        Nac::create(['nac' => 'BUENAVENTURA']);
        Nac::create(['nac' => 'BUGA']);

    }
}
