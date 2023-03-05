<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function permissions()
    {
        return $this->hasMany(permissions::class);
    }
}
