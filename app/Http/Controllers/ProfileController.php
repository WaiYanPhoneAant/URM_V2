<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function Userprofile()
    {
        return view('App.User.profile.userProfile');
    }
    public function userProfileSetting()
    {
        $user = Auth::user();
        return view('App.User.profile.profileSetting', compact('user'));
    }
    public function userProfileSecurity()
    {
        $user = Auth::user();
        return view('App.User.profile.profileSecurity', compact('user'));
    }
    //username update
    public function userNameUpdate(Request $request, $id)
    {
        // Validation
        Validator::make(['username' => $request->username], [
            'username' => 'unique:users,username,' . $id
        ])->validate();
        // update
        User::where('id', $id)->update([
            'username' => $request->username
        ]);
        return back()->with(['success' => 'Username Successfully Updated']);
    }

    //userUpdateDetails
    public function userUpdateDetails(Request $request, $id)
    {
        # validation
        Validator::make(
            [
                'phone' => $request->phone,
                'name' => $request->name,
                'email' => $request->email
            ],
            [
                'name' => 'required',
                'phone' => 'nullable|numeric|required|min:6|unique:users,phone,' . $id,
                'email' => 'nullable|unique:users,email,' . $id,
                'address' => 'max:255',
            ],
            [
                'phone.unique' => "This phone number has already been taken."
            ]
        )->validate();
        //creation
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);
        return back()->with(['success' => 'User Successfully Update']);
    }
    //user password update
    // userpassword update
    public function userPasswordUpdate(Request $request, $id)
    {
        //get data
        $currentPw = $request->currentPw;
        $newPw = $request->newPw;
        $confirmPw = $request->confrimPw;

        //validation
        Validator::make($request->toArray(), [
            'currentPw' => "required|min:8",
            'newPw' => "required|min:8",
            'confirmPw' => "required|min:8|same:newPw"
        ])->validateWithBag('pw');
        //creation
        if (!Hash::check($currentPw, Auth::user()->password)) {
            return back()->with(['error' => 'Password Is Wrong! Please try again.']);
        } else {
            $hashedPw = Hash::make($newPw);
            User::where('id', $id)->update([
                'password' => $hashedPw
            ]);
            return back()->with(['success' => 'Password Successfully Updated']);
        };
    }
    //user delete
    public function userDelete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('userList')->with(['success' => 'User Successfully Deleted']);
    }

}
