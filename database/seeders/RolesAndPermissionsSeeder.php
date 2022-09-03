<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enums\UserPermissions;
use App\Enums\UserRoles;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $userRoles = UserRoles::getValues();
        foreach($userRoles as $role){
            Role::create(['name' => $role]);
        }

        $userPermissions = UserPermissions::getValues();
        foreach($userPermissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
