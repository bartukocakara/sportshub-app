<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use Spatie\Permission\Models\Role as RoleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends RoleModel
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'RoleFilters'))->apply();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions',
                                                        'role_id',
                                                        'permission_id');
    }
}
