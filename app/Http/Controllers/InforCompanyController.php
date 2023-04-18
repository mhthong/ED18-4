<?php

namespace App\Http\Controllers;

use App\Models\InforCompany;
use Illuminate\Http\Request;

class InforCompanyController extends Controller
{
    //

    public function SettingInforCompany()
    {
        $count = InforCompany::count();
        if($count == 0)
        {
            $InforCompany  =   InforCompany::create([

                'name' =>    'Vui Lòng Nhập Thông Tin',
                'address' =>    'Vui Lòng Nhập Thông Tin',
                'hotline' =>    'Vui Lòng Nhập Thông Tin',
                'Logo' =>    'null',
                'email' =>    'Vui Lòng Nhập Thông Tin',
            ]);
            $InforCompany = InforCompany::first();
            return view('admin.setting', compact('InforCompany'));
        }
        else{
            $InforCompany = InforCompany::first();
            return view('admin.setting', compact('InforCompany'));
        }


    }
    // =========== [ Create email configuration ] ==========
    public function createInforCompany(Request $request)
    {

        $path =  $request->Logo;

        $list_odd = explode(env('APP_URL'), $path);
        $arr_image = $list_odd[1];

        $InforCompany  =   InforCompany::first()->update([
            'name' =>       $request->name,
            'address' =>    $request->address,
            'hotline' =>    $request->hotline,
            'Logo' =>       $arr_image,
            'email' =>      $request->email,
        ]);

        if (!is_null($InforCompany)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }
    }
}
