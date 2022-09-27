<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'name'
    ];

//    public function Permissions() {
//        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
//    }

//    public function Permissions(): BelongsToMany
//    {
//        return $this->belongsToMany(Permission::class, 'role_permission');
//    }

//    public function Users(): HasOne
//    {
//        return $this->hasOne(User::class, 'id', 'role_id');
//    }
}
