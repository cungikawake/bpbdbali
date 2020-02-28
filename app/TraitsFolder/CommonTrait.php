<?php

namespace App\TraitsFolder;

use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Gsetting;

trait CommonTrait
{

    
public function sendContact($email,$name,$subject,$message)
    {
        $basic = Gsetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Contact Message - '.$subject,
        ];
        Config::set('mail.driver','mail');
        // Config::set('mail.driver','smtp');
        // Config::set('mail.host','smtp.mailtrap.io');
        // Config::set('mail.username','3d99b9a27da3ed');
        // Config::set('mail.password','6590f71722091f');
        // Config::set('mail.port','2525');
        Config::set('mail.from',$basic->email);
        Config::set('mail.name',$basic->title);

        $body = $basic->email_body;
        $footer = $basic->title;
        $body = str_replace("Hi",'Hi. I\'m',$body);
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$message,$body);
        $body = str_replace("{{footer}}",$footer,$body);


        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }

    public function userPasswordReset($email,$name,$route)
    {
        $basic = Gsetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Password Reset Request',
        ];
        
        Config::set('mail.driver','mail');
        // Config::set('mail.driver','smtp');
        // Config::set('mail.host','smtp.mailtrap.io');
        // Config::set('mail.username','3d99b9a27da3ed');
        // Config::set('mail.password','6590f71722091f');
        // Config::set('mail.port','2525');
        // Config::set('mail.ENCRYPTION','tls');
        Config::set('mail.from',$basic->email);
        Config::set('mail.name',$basic->title);

        $reset = DB::table('password_resets')->whereEmail($email)->count();
        $token = Str::random(40);
        $bToken = bcrypt($token);
        $url = route($route,$token);
        if ($reset == 0){
            DB::table('password_resets')->insert(
                ['email' => $email, 'token' => $bToken]
            );
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }else{
            DB::table('password_resets')
                ->where('email', $email)
                ->update(['email' => $email, 'token' => $bToken]);
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }
    }
}