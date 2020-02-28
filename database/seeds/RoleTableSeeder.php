<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $role_user = new Role();
	        $role_user->slug = "admin";
	        $role_user->name = "Admin";
	        $role_user->save();

          $role_user = new Role();
          $role_user->slug = "manager";
          $role_user->name = "Manager";
          $role_user->save();

          $role_user = new Role();
          $role_user->slug = "staff";
          $role_user->name = "Staff";
          $role_user->save();

          $role_user = new Role();
	        $role_user->slug = "user";
	        $role_user->name = "User";
	        $role_user->save();

    }
}
