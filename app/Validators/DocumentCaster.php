<?php

namespace App\Validators;

use App\Support\DocumentValidator;
use Spatie\DataTransferObject\Caster;
use InvalidArgumentException;

class DocumentCaster implements Caster
{
    public function cast(mixed $value): string
    {
        if (!DocumentValidator::validateCPF($value) && !DocumentValidator::validateCNPJ($value)) {
            throw new InvalidArgumentException("Invalid document format.");
        }

        return $value;
    }
}
