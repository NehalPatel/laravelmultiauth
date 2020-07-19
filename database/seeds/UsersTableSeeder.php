<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Admin;
use App\Models\Role;

use App\Helpers\UniqueNumberHelper;


class UsersTableSeeder extends Seeder
{

    private $admins = [
        'superadmin'     =>  [
            'username'      => 'superadmin',
            'name'          => 'Super Admin',
            'email'         => 'superadmin@example.com',
            'password'      => '123456',
            'user_role'     => 'Super Admin'
        ],
    ];

    private $users = [
        'admin'     =>  [
            'username'      => 'admin',
            'name'          => 'Admin',
            'email'         => 'admin@example.com',
            'password'      => '123456',
            'user_role'     => 'Admin'
        ],
        'demouser1'     =>  [
            'username'      => 'demouser1',
            'name'          => 'Demo User 1',
            'email'         => 'demouser1@example.com',
            'password'      => '123456',
            'user_role'     => 'Society President'
        ],
        'demouser2'     =>  [
            'username'      => 'demouser2',
            'name'          => 'Demo User 2',
            'email'         => 'demouser2@example.com',
            'password'      => '123456',
            'user_role'     => 'Society Treserer'
        ],
        'demouser3'     =>  [
            'username'      => 'demouser3',
            'name'          => 'Demo User 3',
            'email'         => 'demouser3@example.com',
            'password'      => '123456',
            'user_role'     => 'Committee Member'
        ],
        'demouser4'     =>  [
            'username'      => 'demouser4',
            'name'          => 'Demo User 4',
            'email'         => 'demouser4@example.com',
            'password'      => '123456',
            'user_role'     => 'Flat Owner'
        ],
        'demouser5'     =>  [
            'username'      => 'demouser5',
            'name'          => 'Demo User 5',
            'email'         => 'demouser5@example.com',
            'password'      => '123456',
            'user_role'     => 'Flat Owner Member'
        ],
        'demouser6'     =>  [
            'username'      => 'demouser6',
            'name'          => 'Demo User 6',
            'email'         => 'demouser6@example.com',
            'password'      => '123456',
            'user_role'     => 'Flat Tenant'
        ],
        'demouser7'     =>  [
            'username'      => 'demouser7',
            'name'          => 'Demo User 7',
            'email'         => 'demouser7@example.com',
            'password'      => '123456',
            'user_role'     => 'Vendor'
        ],
        'demouser8'     =>  [
            'username'      => 'demouser8',
            'name'          => 'Demo User 8',
            'email'         => 'demouser8@example.com',
            'password'      => '123456',
            'user_role'     => 'Guest'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('admins')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->admins as $key => $admin) {

            $new_admin = Admin::create([
                'name'          => $admin['name'],
                'email'         => $admin['email'],
                'password'      => bcrypt($admin['password']),
                'email_verified_at' => now(),
                'remember_token'=> Str::random(10),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]);

            $new_admin->assignRole($admin['user_role']);

        }

        foreach ($this->users as $key => $user) {

            $new_user = User::create([
                'name'          => $user['name'],
                'email'         => $user['email'],
                'password'      => bcrypt($user['password']),
                'email_verified_at' => now(),
                'remember_token'=> Str::random(10),
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]);

            $new_user->assignRole($user['user_role']);

        }
        //factory(App\Models\User::class, 2)->create();

        factory(\App\Models\User::class, 2)->create()->each(function($user) {
            $user->assignRole('Guest');
        });
    }
}
