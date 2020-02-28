<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(SocialTableSeeder::class);
        $this->call(GsettingTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(SeoTableSeeder::class);

        $this->call(RoleTableSeeder::class);
        // After seeding u should user_roles setting manually
    }
}
