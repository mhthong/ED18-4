<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function Setting(Request $request)
    {
        $arr = $request->all();

        foreach ($arr as $arr => $arrvalue) {
            if ($arr == 'facebook_admins') {
                $key[] = $arr;
                foreach ($arrvalue as $keyfacebook_admins => $valuefacebook_admins) {
                    /*                 $keyface_admins[]=$keyfacebook_admins; */
                    $valueface_admins[] = json_encode($valuefacebook_admins);
                };
                $value[] = json_encode($valueface_admins);
            }
            elseif($arr == 'analytics_service_account_credentials')
            {   $key[] = $arr;
                $value[] =$arrvalue;
            }
            elseif($arr == 'admin-favicon' || $arr == 'admin-logo' || $arr == 'admin-login-screen-backgrounds' )
            {
                    $key[] = $arr;
                    $eror_img = explode(env('APP_ENV'), $arrvalue);
                    $image=end($eror_img);
                    $value[] =$image;
            }
            else {
                $key[] = $arr;
                $value[] = $arrvalue;
            }

        };

        for ($i = 1; $i < count($key); $i++) {
            $isExist = Setting::select("*")
                ->where('key', $key[$i])
                ->exists();
            $eror_img = explode(env('APP_ENV'), $value[$i]);
            $value[$i] = end($eror_img);

            if ($isExist) {
                $configuration = Setting::where('key', $key[$i])->update([
                    "key"  =>      $key[$i],
                    "value"        =>      $value[$i],
                ]);
            } else {
                $configuration =  Setting::create([
                    "key"  =>      $key[$i],
                    "value"        =>      $value[$i],
                ]);
            }
        }
        return back()->with("success", "Cập nhật Thành Công.");
    }


    public function SettingValue()
    {
        $Setting = Setting::select('*')->get();
        $array = array();

        foreach ($Setting as $data) {
            $array[$data->key] =  $data->value;
        };
        return  View::first(['admin.setting', 'app','admin.Setting.general'], compact('array'));
    }

    public function general(){
      return view('admin.Setting.general');
    }

    public function email(){
        return view('admin.Setting.email');
    }


}
