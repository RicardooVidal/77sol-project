<?php

namespace App\Domains\Customer\Services\DTO;

use App\Support\DocumentValidator;
use InvalidArgumentException;
use Spatie\DataTransferObject\DataTransferObject;

class CustomerDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $phone;
    public string $document;

    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters);

        if (!DocumentValidator::validateCPF($this->document) && !DocumentValidator::validateCNPJ($this->document)) {
            throw new InvalidArgumentException("Invalid document format.");
        }
    }
}