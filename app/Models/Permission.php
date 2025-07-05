<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    use HasFactory;

    protected $table = 'permissions';
    protected $hidden = ['pivot'];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'PermissionFilters'))->apply();
    }

    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions',
                                                        'permission_id',
                                                        'role_id');
    }
}
