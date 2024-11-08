<?php

namespace App\Domains\Project\Entities;

use App\Domains\Equipment\Entities\Equipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectEquipment extends Model
{
    protected $table = 'projects_equipments';

    protected $fillable = [
        'project_id',
        'equipment_id',
        'quantity'
    ];

    protected $hidden = ['id', 'project_id', 'equipment_id', 'created_at', 'updated_at'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function equipment(): HasOne
    {
        return $this->hasOne(Equipment::class, 'id', 'equipment_id');
    }
}
