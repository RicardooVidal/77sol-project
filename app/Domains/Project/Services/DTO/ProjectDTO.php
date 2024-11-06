<?php

namespace App\Domains\Project\Services\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ProjectDTO extends DataTransferObject
{
    public int $customer_id;
    public int $installation_type_id;
    public string $location;
}