<?php

namespace App\Domains\Project\Services\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProjectEquipmentDTO extends DataTransferObject
{
    public int $equipment_id;
    public int $quantity;
}