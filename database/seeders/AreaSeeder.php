<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'nombre_area' => 'Rectoria',
            'titular' => 'Ruth',
            'informacion' => 'Protecolo rectoria',
            'telefono' => '1111111'
        ]);
        
        Area::create([
            'nombre_area' => 'Coordinacion com',
            'titular' => 'Matrha',
            'informacion' => 'Ayuda procesos',
            'telefono' => '1111111'
        ]);
    }
}
