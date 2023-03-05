<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_permissions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'roles_id', 'permissions_id'
    ];
}
