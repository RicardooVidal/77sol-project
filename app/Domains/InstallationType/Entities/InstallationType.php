<?php

namespace App\Domains\InstallationType\Entities;

use Illuminate\Database\Eloquent\Model;

class InstallationType extends Model
{
    protected $table = 'installation_types';

    protected $fillable = [
        'description'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
