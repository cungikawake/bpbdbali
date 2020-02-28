<?php

use Illuminate\Database\Seeder;
use App\Gsetting;
use Carbon\Carbon;
class GsettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Gsetting = new Gsetting();
        $Gsetting->about = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem";
        $Gsetting->footer = "COPYRIGHT 2017 Genius Ocean";
        $Gsetting->address = "124/6 Street, States, Country";
        $Gsetting->phone = "00 000 000 000";
        $Gsetting->fax = "00 000 000 000";
        $Gsetting->email = "admin@geniusocean.com";
        $Gsetting->title = "Newspaper | Megazine | Blog";
        $Gsetting->populartag = "sport,national,worlds,usa,politics,election,science";
        $Gsetting->save();

        $Gsetting = new Gsetting();
        $Gsetting->about = "lorem sit voluptatem";
        $Gsetting->footer = "COPYRIGHT 2018 Genius Ocean";
        $Gsetting->address = "Street, States, Country";
        $Gsetting->phone = "11 111 11 11 1";
        $Gsetting->fax = "11 11 1 11 11";
        $Gsetting->email = "ronnie@geniusocean.com";
        $Gsetting->title = "Newspaper | Megazine | Blog";
        $Gsetting->populartag = "sport,national,worlds,usa,politics,election,science";
        $Gsetting->save();
    }
}
