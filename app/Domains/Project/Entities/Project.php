<?php

namespace App\Domains\Project\Entities;

use App\Domains\Customer\Entities\Customer;
use App\Domains\InstallationType\Entities\InstallationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'customer_id',
        'installation_type_id',
        'location'
    ];

    protected $hidden = ['customer_id', 'updated_at', 'installation_type_id'];

    public function equipments(): HasMany
    {
        return $this->hasMany(ProjectEquipment::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function installationType(): BelongsTo
    {
        return $this->belongsTo(InstallationType::class);
    }
}
