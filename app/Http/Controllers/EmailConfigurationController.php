<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\FormContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Mail\DynamicEmail;
use App\Mail\DynamicEmailAdminSend;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use  App\Providers\MailConfigProvider;
use Illuminate\Support\Facades\Schema;
use function PHPUnit\Framework\isNull;

class EmailConfigurationController extends Controller
{


    public function sendEmail(Request $request)
    {

        $arr = array(
            "email_driver",
            "email_hostName",
            "email_encryption",
            "email_port",
            "email_userName",
            "email_password",
            "email_senderName",
            "email_senderEmail",
        );
        foreach ($arr as $arrkey => $arrvalue) {
            $configuration = Setting::where('key', $arrvalue)->get();

            foreach ($configuration as $key => $value) {
                # code...
                $value_setting[$value->key] = $value->value;
            }
        }

        $config = array(
            'driver'     =>     $value_setting["email_driver"],
            'host'       =>     $value_setting["email_hostName"],
            'port'       =>     $value_setting["email_port"],
            'encryption' =>     $value_setting["email_encryption"],
            'username'   =>     $value_setting["email_userName"],
            'password'   =>     $value_setting["email_password"],
            'from'       =>     ['address' => $value_setting["email_senderEmail"], 'name' => $value_setting["email_senderName"]],
        );


        Config::set('mail', $config);


        $toEmail    =   $request->emailAddress;
        $data       =    $request->message;



        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new DynamicEmail($data));

        if (Mail::failures() != 0) {
            return back()->with("success", "E-mail sent successfully!");
        } else {
            return back()->with("failed", "E-mail not sent!");
        }
    }

    public function sendEmail_ad(Request $request)
    {

        $arr = array(
            "email_driver",
            "email_hostName",
            "email_encryption",
            "email_port",
            "email_userName",
            "email_password",
            "email_senderName",
            "email_senderEmail",
        );
        foreach ($arr as $arrkey => $arrvalue) {
            $configuration = Setting::where('key', $arrvalue)->get();

            foreach ($configuration as $key => $value) {
                # code...
                $value_setting[$value->key] = $value->value;
            }
        }

        $config = array(
            'driver'     =>     $value_setting["email_driver"],
            'host'       =>     $value_setting["email_hostName"],
            'port'       =>     $value_setting["email_port"],
            'encryption' =>     $value_setting["email_encryption"],
            'username'   =>     $value_setting["email_userName"],
            'password'   =>     $value_setting["email_password"],
            'from'       =>     ['address' => $value_setting["email_senderEmail"], 'name' => $value_setting["email_senderName"]],
        );


        Config::set('mail', $config);


        $toEmail    =   $request->emailAddress;
        $data       =    $request->message;



        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new DynamicEmailAdminSend($data));

        if (Mail::failures() != 0) {
            return back()->with("success", "E-mail sent successfully!");
        } else {
            return back()->with("failed", "E-mail not sent!");
        }
    }
}
