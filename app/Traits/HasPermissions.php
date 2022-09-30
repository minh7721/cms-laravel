<?php
namespace App\Traits;

use App\Models\Role;

trait HasPermissions
{
    protected $permissionList = null;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->permissionList->contains('name', $role);
        }

        return false;
    }

    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count() > 0;
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }

    private function getPermissions()
    {
        $role = $this->permissionList->first();
        if ($role) {
            if (! $role->relationLoaded('permissions')) {
                $this->permissionList->load('permissions');
            }

            $this->permissionList = $this->permissionList->pluck('permissions')->flatten();
        }

        return $this->permissionList ?? collect();
    }
}
