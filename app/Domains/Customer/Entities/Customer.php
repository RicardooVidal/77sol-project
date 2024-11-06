<?php

namespace App\Domains\Customer\Entities;

use App\Domains\Project\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'document'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    protected $hidden = ['updated_at', 'deleted_at'];
}
