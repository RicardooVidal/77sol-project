<?php

namespace App\Domains\Equipment\Entities;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [
        'description'
    ];
}
