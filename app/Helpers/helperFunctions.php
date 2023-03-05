<?php

//  This all function are check for each feature's permission
use Carbon\Carbon;
use App\Models\User;
use App\Helpers\helperFunctions;
use Illuminate\Support\Facades\Auth;


function isOnline(int $id=0)
{

    if($id!=0){
        $time= User::where('id',$id)->first()['last_activity'];
    }else{
        $time = Auth::user()->lastActivity;
    }
    if ($time==null) {
        return false;
    }
    $lastActivity = Carbon::parse($time);
    $datetime2 = Carbon::parse(now());
    return $lastActivity->diffInMinutes($datetime2) < 1;
}
