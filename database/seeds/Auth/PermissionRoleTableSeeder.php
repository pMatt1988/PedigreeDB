<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $executive = Role::create(['name' => 'executive']);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $permissions = ['view backend', 'edit dogs', 'create dogs', 'delete dogs', 'view dogs'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to other Roles
        $executive->givePermissionTo(['view backend', 'edit dogs', 'view dogs', 'create dogs']);
        $user->givePermissionTo(['view dogs', 'create dogs']);


        $this->enableForeignKeys();
    }
}
