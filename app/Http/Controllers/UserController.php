<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //for show user list
    public function userList()
    {
        $users = User::with('role')
            ->when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('username', 'like', '%' . request('search') . '%')
                    ->orWhereHas('role', function ($q) {
                        $q->where('name', 'like', '%' . request('search') . '%');
                    })
                    ->orWhere('phone', 'like', '%' . request('search') . '%')
                    ->orWhere('address', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            })
            ->when(request('filter_role'), function ($query) {
                $query->whereHas('role', function ($q) {
                    $q->where('name', 'like', '%' . request('filter_role') . '%');
                });
            })
            ->paginate(15);
        $users->appends(request()->all());
        $roles = roles::get();
        return view('App.User.userList', compact('users', 'roles'));
    }
    //user create
    public function userCreate(Request $request)
    {
        # user create validation
        Validator::make($request->toArray(), [
            'name' => 'required',
            'user_name' => 'required|unique:users,username',
            'user_email' => 'nullable|unique:users,email',
            'password' => 'required|min:8',
            'user_phone' => 'numeric|required|min:6',
            'address' => 'max:255',
            'confirm_password' => 'required|same:password'
        ])->validate();

        // user creation
        User::create(
            [
                'name' => $request->user_name,
                'username' => $request->user_name,
                'email' => $request->user_email,
                'phone' => $request->user_phone,
                'address' => $request->address,
                'gender' => $request->user_gender,
                'role_id' => $request->role,
                'password' => Hash::make($request->password),
            ]
        );
        return back()->with(['success' => 'User Successfully Created']);
    }

    //user view
    public function userView($id)
    {
        $user = User::where('id', $id)->with('role')->first();
        $roles = roles::get();
        return view('App.User.viewUser', compact('user', 'roles'));
    }

    //username update
    public function userNameUpdate(Request $request)
    {
        // Validation
        $id = $request->id;
        $validator = Validator::make(['username' => $request->username], [
            'username' => 'unique:users,username,' . $id
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => "false", "message" => $validator->messages()], 200);
        }

        // creation
        User::where('id', $id)->update([
            'username' => $request->username
        ]);
        return response()->json(['status' => "success"], 200);
    }


    // userpassword update
    public function userPasswordUpdate(Request $request)
    {
        //get data
        $id = $request->id;
        // $currentPw = $request->currentPw;
        $newPw = $request->newPw;
        $confirmPw = $request->confrimPw;

        //validation
        $validator = Validator::make([
            // 'current password' => $currentPw,
            'new password' => $newPw,
            'confirm password' => $confirmPw,
        ], [
            // 'current password' => "required|min:8",
            'new password' => "required|min:8",
            'confirm password' => "required|min:8|same:new password"
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => "false", "message" => $validator->messages()], 200);
        }
        //creation
        // if (!Hash::check($currentPw, Auth::user()->password)) {
        //     return response()->json(['status' => "false", "message" => ['current password' => 'Current Password Is Wrong']], 200);
        // } else {
            logger('hello');
        $hashedPw = Hash::make($newPw);
        User::where('id', $id)->update([
            'password' => $hashedPw
        ]);
        return response()->json(['status' => "success", "message" => $validator->messages()], 200);
        // };
    }

    //userUpdateDetails
    public function userUpdateDetails(Request $request)
    {
        # validation
        $validator = Validator::make(
            [
                'phone number' => $request->phone,
                'name' => $request->name,
                'email' => $request->email
            ],
            [
                'name' => 'required',
                'phone number' => 'numeric|required|min:6|unique:users,phone,' . $request->id,
                'email' => 'nullable|unique:users,email,' . $request->id,
                'address' => 'max:255',
            ],
            [
                'phone number.unique' => "This phone number has already been taken."
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => "false", "message" => $validator->messages()], 200);
        }
        //creation
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'is_active' => Auth::user()->id == $request->id ? '1' : $request->active,
        ]);
        return response()->json(['status' => "success"], 200);
    }

    // userRoleUpdat
    public function userRoleUpdate(Request $request)
    {
        # code...
        logger($request->toArray());
        User::where('id', $request->id)->update([
            'role_id' => $request->role_id
        ]);
        return response()->json(['status' => "success"], 200);
    }
    public function userDelete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('userList')->with(['success' => 'User Successfully Deleted']);
    }


}
