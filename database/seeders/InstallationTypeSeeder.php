<?php

namespace Database\Seeders;

use App\Domains\InstallationType\Entities\InstallationType;
use Illuminate\Database\Seeder;

class InstallationTypeSeeder extends Seeder
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
            InstallationType::create(['description' => $type]);
        }
    }
}
