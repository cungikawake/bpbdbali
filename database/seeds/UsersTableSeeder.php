<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
	        $user->first_name = "Ronnie";
	        $user->last_name = "Area";
	        $user->email = "r@gmail.com";
	        $user->password = bcrypt("123456");
	        $user->save();

			$user = new User();
	        $user->first_name = "Kamal";
	        $user->last_name = "Uddin";
	        $user->email = "k@gmail.com";
	        $user->password = bcrypt("123456");
	        $user->save();


    }
}
