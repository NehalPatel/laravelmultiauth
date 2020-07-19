<?php

use Illuminate\Database\Seeder;

use App\Constants\RolesPermissions;
use App\Models\User;
use App\Models\Role;

class UserRolesPermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (RolesPermissions::$ADMIN_ROLES as $role) {
        	DB::table('roles')->insert([
	            'name'      	=> $role,
	            'guard_name'    => 'admin',
	            'created_at'    => date("Y-m-d H:i:s"),
	            'updated_at'    => date("Y-m-d H:i:s")
	        ]);
        }

        foreach (RolesPermissions::$ROLES as $role) {
            DB::table('roles')->insert([
                'name'          => $role,
                'guard_name'    => 'web',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]);
        }

        foreach (RolesPermissions::$PERMISSIONS as $entity => $permissions) {
            foreach ($permissions as $permission => $permission_name) {
            	DB::table('permissions')->insert([
    	            'name'      	=> $permission,
    	            'guard_name'    => 'web',
    	            'created_at'    => date("Y-m-d H:i:s"),
    	            'updated_at'    => date("Y-m-d H:i:s")
    	        ]);
            }
        }

        //$user = User::stored()->email('nehal@tecknic.in');

        //$user->assignRole('Super Admin');

        /*$role = Role::stored()->name('Super Admin')->get();

        try {
            $user->assignRole($role);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }*/

    }
}
