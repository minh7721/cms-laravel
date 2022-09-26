<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

//    public function Roles() {
//        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
//    }

//    public function Roles(): BelongsToMany
//    {
//        return $this->belongsToMany(Role::class, 'role_permission');
//    }
}
