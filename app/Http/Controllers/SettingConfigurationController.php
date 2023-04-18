<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingConfiguration;
use App\Models\EmailConfiguration;
use App\Models\InforCompany;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingConfigurationController extends Controller
{
    public function dashboard()
    {




        $countInforCompany = InforCompany::count();

        if($countInforCompany == 0)
        {
            $InforCompany  =   InforCompany::create([

                'name' =>    'Vui Lòng Nhập Thông Tin',
                'address' =>    'Vui Lòng Nhập Thông Tin',
                'hotline' =>    'Vui Lòng Nhập Thông Tin',
                'Logo' =>    'null',
                'email' =>    'Vui Lòng Nhập Thông Tin',
            ]);

        }

        $seo_title = Setting::where('key','seo_title')->first();
        $seo_description = Setting::where('key','seo_description')->first();
        $seo_image = Setting::where('key','seo_image')->first();
        $InforCompany = InforCompany::first();
        return view('admin.setting', compact('InforCompany','seo_title','seo_description','seo_image'));
    }

    public function SetttingEmail()
    {
        $count = EmailConfiguration::count();
        if($count == 0)
        {
            $EmailConfiguration  =   EmailConfiguration::create([
                "user_id"       =>    Auth::user()->id,
                "driver"        =>    'smtp',
                "host"          =>    'sandbox.smtp@mail',
                "port"          =>    '467',
                "encryp tion"   =>    'tls',
                "user_name"     =>    'null',
                "password"      =>    'null',
                "sender_name"   =>    'null',
                "sender_email"  =>    'null'
            ]);

        }
        $EmailConfiguration = EmailConfiguration::first();
        return view('admin.setting-email', compact('EmailConfiguration' ));
    }
    //
    // =========== [ Create email configuration ] ==========
    public function createConfiguration(Request $request) {

        $configuration  =   SettingConfiguration::create([
            "user_id"       =>      Auth::user()->id,
            "driver"        =>      $request->driver,
            "host"          =>      $request->hostName,
            "port"          =>      $request->port,
            "encryption"    =>      $request->encryption,
            "user_name"     =>      $request->userName,
            "password"      =>      $request->password,
            "sender_name"   =>      $request->senderName,
            "sender_email"  =>      $request->senderEmail
        ]);

        if(!is_null($configuration)) {
           return back()->with("success", "Cập nhật Thành Công.");
        }

        else {
            return back()->with("failed", "Cập Nhật Không Thành Công.");
        }
    }






}
