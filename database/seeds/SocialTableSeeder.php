<?php

use Illuminate\Database\Seeder;
use App\Social;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social = new Social();
        $social->name = "facebook";
        $social->code = "<i class='fa fa-facebook' aria-hidden='true'></i>";
        $social->link = "https://www.facebook.com/";
        $social->save();

        $social = new Social();
        $social->name = "Google Plus";
        $social->code = "<i class='fa fa-google-plus' aria-hidden='true'></i>";
        $social->link = "https://www.googleplus.com/";
        $social->save();

    }
}
