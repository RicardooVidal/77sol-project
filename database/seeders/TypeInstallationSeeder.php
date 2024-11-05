<?php

namespace Database\Seeders;

use App\Domains\TypeInstallation\Entities\TypeInstallation;
use Illuminate\Database\Seeder;

class TypeInstallationSeeder extends Seeder
{
    const Types = [
        'Fibrocimento (Madeira)',
        'Fibrocimento (Metálico)',
        'Cerâmico',
        'Metálico',
        'Laje',
        'Solo'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(self::Types as $type) {
            TypeInstallation::create(['description' => $type]);
        }
    }
}
