<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\roles;
use App\Models\features;
use App\Models\permissions;
use App\Models\roles_permissions;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $features = ['user', 'role'];
    private $permissions = ['view', 'create', 'update', 'delete'];
    public function run()
    {
        //default role create
        $adminRole = roles::create([
            'name' => 'administrator'
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'gender' => 'male',
            'is_active' => true,
            'password' => Hash::make('admin1234'),
        ]);
        //adding feature1
        foreach ($this->features as $feature) {
            $featureData = features::create([
                'name' => $feature,
            ]);
            //adding permission for features
            foreach ($this->permissions as $permission) {
                # code...
                permissions::create([
                    'name' => $permission,
                    'features_id' => $featureData->id,
                ]);
            }
        }
        $permissionId = permissions::get();
        foreach ($permissionId as $p) {
            roles_permissions::create([
                'roles_id' => $adminRole->id,
                'permissions_id' => $p->id,
            ]);
        }
    }
}
