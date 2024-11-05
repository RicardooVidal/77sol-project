<?php

namespace Database\Seeders;

use App\Domains\Equipment\Entities\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    const Equipments = [
        'Módulo',
        'Inversor',
        'Microinversor',
        'Estrutura',
        'Cabo vermelho',
        'Cabo preto',
        'String Box',
        'Cabo Tronco',
        'Endcap'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(self::Equipments as $equipment) {
            Equipment::create(['description' => $equipment]);
        }
    }
}
