<?php

namespace App\Domains\Project\Entities;

use App\Domains\Customer\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'customer_id',
        'installation_type_id',
        'location'
    ];

    public function equipments(): HasMany
    {
        return $this->hasMany(ProjectEquipment::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
