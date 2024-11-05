<?php

namespace App\Domains\TypeInstallation\Entities;

use Illuminate\Database\Eloquent\Model;

class TypeInstallation extends Model
{
    protected $table = 'types_installations';

    protected $fillable = [
        'description'
    ];
}
