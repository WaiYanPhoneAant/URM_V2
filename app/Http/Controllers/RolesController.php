<?php

namespace App\Http\Controllers;

use App\Models\adminUsers;
use App\Models\roles;
use App\Models\features;
use App\Models\permissions;
use App\Models\roles_permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    //for show role list
    public function roleList()
    {
        $roles = roles::with('roles_permissions')
            ->when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })
            ->paginate(15);
        $roles->appends(request()->all());
        $features = features::with('permissions')->get();
        return view('App.Role.roleList', compact('roles', 'features'));
    }
    //role creation
    public function roleCreate(Request $request)
    {
        # code...
        $requestData = $request->toArray();
        $permissionsId = array_splice($requestData, 2);

        //validation
        Validator::make($requestData, [
            'role_name' => 'required|unique:roles,name'
        ])->validate();

        //role count validation
        if (count($permissionsId) == 0) {
            return back()->with(['permissionError' => 'At least one permission must be specified', 'role_name' => $request->role_name]);
        }
        $permissions = array_values($permissionsId);

        //role name create
        $role = roles::create([
            'name' => $request->role_name
        ]);
        $role_id = $role->id;

        // permission create
        foreach ($permissions as $permission) {
            roles_permissions::create([
                'roles_id' => $role_id,
                'permissions_id' => $permission
            ]);
        }
        return back()->with(['success' => 'Role Successfully Created']);
    }

    //role update
    public function roleUpdate($id, Request $request)
    {
        $requestData = $request->toArray();
        $key = $request->key;
        $roleName = "role_update_name_$key";

        //validation
        Validator::make($requestData, [
            "$roleName" => 'required|unique:roles,name,' . $id
        ], [
            "$roleName.unique" => 'The role name has already been taken.'
        ])->validate();
        $permissionsId = array_splice($requestData, 3);
        if (count($permissionsId) == 0) {
            return back()->with(["permissionError_$key" => 'At least one permission must be specified', $roleName . "_" . $key => $request->role_name]);
        }

        //update role name
        roles::where('id', $id)->update([
            'name' => $request->$roleName,
        ]);

        //drop existing permission
        $this->permissionDelete($id);

        //create new permission
        $permissions = array_values($permissionsId);
        foreach ($permissions as $permission) {
            roles_permissions::create([
                'roles_id' => $id,
                'permissions_id' => $permission
            ]);
        }
        return back()->with(['success' => 'Role Successfully Updated']);
    }

    // for role delete
    public function roleDelete($id)
    {
        if ($id != 1) {
            roles::where('id', $id)->delete();
            $this->permissionDelete($id);
        }
        return back()->with(['success' => 'Role Successfully Deleted']);
    }
    //for permissin delete
    private function permissionDelete($id)
    {
        roles_permissions::where('roles_id', $id)->delete();
    }
}
