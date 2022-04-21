<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list barangs']);
        Permission::create(['name' => 'view barangs']);
        Permission::create(['name' => 'create barangs']);
        Permission::create(['name' => 'update barangs']);
        Permission::create(['name' => 'delete barangs']);

        Permission::create(['name' => 'list detailtransaksis']);
        Permission::create(['name' => 'view detailtransaksis']);
        Permission::create(['name' => 'create detailtransaksis']);
        Permission::create(['name' => 'update detailtransaksis']);
        Permission::create(['name' => 'delete detailtransaksis']);

        Permission::create(['name' => 'list itemtransaksipetanis']);
        Permission::create(['name' => 'view itemtransaksipetanis']);
        Permission::create(['name' => 'create itemtransaksipetanis']);
        Permission::create(['name' => 'update itemtransaksipetanis']);
        Permission::create(['name' => 'delete itemtransaksipetanis']);

        Permission::create(['name' => 'list alljenistanamans']);
        Permission::create(['name' => 'view alljenistanamans']);
        Permission::create(['name' => 'create alljenistanamans']);
        Permission::create(['name' => 'update alljenistanamans']);
        Permission::create(['name' => 'delete alljenistanamans']);

        Permission::create(['name' => 'list lahans']);
        Permission::create(['name' => 'view lahans']);
        Permission::create(['name' => 'create lahans']);
        Permission::create(['name' => 'update lahans']);
        Permission::create(['name' => 'delete lahans']);

        Permission::create(['name' => 'list limitstoks']);
        Permission::create(['name' => 'view limitstoks']);
        Permission::create(['name' => 'create limitstoks']);
        Permission::create(['name' => 'update limitstoks']);
        Permission::create(['name' => 'delete limitstoks']);

        Permission::create(['name' => 'list panens']);
        Permission::create(['name' => 'view panens']);
        Permission::create(['name' => 'create panens']);
        Permission::create(['name' => 'update panens']);
        Permission::create(['name' => 'delete panens']);

        Permission::create(['name' => 'list transaksis']);
        Permission::create(['name' => 'view transaksis']);
        Permission::create(['name' => 'create transaksis']);
        Permission::create(['name' => 'update transaksis']);
        Permission::create(['name' => 'delete transaksis']);

        Permission::create(['name' => 'list transaksipetanis']);
        Permission::create(['name' => 'view transaksipetanis']);
        Permission::create(['name' => 'create transaksipetanis']);
        Permission::create(['name' => 'update transaksipetanis']);
        Permission::create(['name' => 'delete transaksipetanis']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
