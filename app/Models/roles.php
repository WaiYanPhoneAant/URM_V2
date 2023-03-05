<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function roles_permissions(){
        return $this->hasMany(roles_permissions::class);
    }
}
