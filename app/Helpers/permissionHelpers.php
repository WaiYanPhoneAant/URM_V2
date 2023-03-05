<?php

namespace App\Helpers;

use App\Models\permissions;
use Hamcrest\Type\IsBoolean;
use App\Models\roles_permissions;
use PhpParser\Node\Expr\Cast\Bool_;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\ObjectType;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class permissionHelpers{
    // get user permission
    public static function permissions()
    {
        $permissions=roles_permissions::select('permissions.name as permissions','features.name as feature')
        ->where('roles_id',Auth::user()->role_id)
        ->leftJoin('permissions','permissions.id','roles_permissions.permissions_id')
        ->leftJoin('features','features.id','permissions.features_id')
        ->get();
        return $permissions;

    }
    public static function checkPermission(String $feature,String $permission): bool
    {
        
        $AuthUserpermissions= self::permissions();
        foreach($AuthUserpermissions as $p){
            if($p->permissions==$permission && $p->feature==$feature ){
              return true;
            }
        }
        return false;
    }
}


