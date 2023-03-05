<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'lastActivity'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('App.dashboard');
    })->name('dashboard');

    //For Admin Users
    Route::controller(UserController::class)->group(function () {
        Route::prefix('user')->group(function () {
            //users create
            Route::post('/create', 'userCreate')->name('userCreate')->middleware('createPermissionCheck:user');
            //users views
            Route::get('/list', 'userList')->name('userList')->middleware('viewPermissionCheck:user');
            Route::get('{id}/view', 'userView')->name('userView')->middleware('viewPermissionCheck:user,true');
            //users update
            Route::middleware('updatePermissionCheck:user,true')->group(function () {
                Route::post('/username/update/', 'userNameUpdate');
                Route::post('password/update', 'userPasswordUpdate');
                Route::post('update/details/', 'userUpdateDetails');
            });
            Route::post('update/role', 'userRoleUpdate')->middleware('updatePermissionCheck:user');
            //users Delete
            Route::delete('{id}/delete', 'userDelete')->name('userDelete')->middleware('deletePermissionCheck:user,true');
        });
    });
    // for profile
    Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile','userProfile')->name('userProfile');
            Route::get('/profile/setting', 'userProfileSetting')->name('userProfileSetting');
            Route::get('/profile/security', 'userProfileSecurity')->name('userProfileSecurity');
            Route::post('{id}/username/update/', 'userNameUpdate')->name('userProfileNameUpdate');
            Route::post('{id}/password/update', 'userPasswordUpdate')->name('userProfilePwUpdate');
            Route::post('update/{id}/details/', 'userUpdateDetails')->name('updateDetails');
    });
    // For role
    Route::controller(RolesController::class)->group(function () {
        Route::prefix('role')->group(function () {
            //Role Create
            Route::post('create', 'roleCreate')->name('roleCreate')->middleware('createPermissionCheck:role');
            //role view
            Route::get('list', 'roleList')->name('roleList')->middleware('viewPermissionCheck:role');
            //role delete
            Route::delete('{id}/delete', 'roleDelete')->name('roleDelete')->middleware('deletePermissionCheck:role');
            //role update
            Route::post('{id}/update', 'roleUpdate')->name('roleUpdate')->middleware('updatePermissionCheck:role');
        });
    });



    Route::get('/', function () {
        return view('App.dashboard');
    });
    // Route::get('/list', function () {
    //     return view('App.User.userList');
    // });

    // Route::get('role/list', function () {
    //     return view('App.Role.roleList');
    // });
    Route::get('signIn', function () {
        return view('App.Auth.sign-in');
    });
    Route::get('signUp', function () {
        return view('App.Auth.sign-up');
    });
});
