<?php

use Illuminate\Database\Seeder;
use App\Seo;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = new Seo();
	        $user->analytics ="<script>
							  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
							  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
							  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
							  ga('create', 'UA-105174932-1', 'auto');
							  ga('send', 'pageview');
							</script>";
	        $user->metakeyword = "Genius,Ocean,Sea,Etc,Genius,Ocean,Sea,Etc";
	        $user->save();
    }
}
