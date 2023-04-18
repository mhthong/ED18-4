<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use Illuminate\Support\Collection;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin.index');

    }

    public function YourSetting(){
        $this->middleware('auth');
        return view('admin.admin-setting');
    }

    public function ResetPassword(Request $request){
        $this->middleware('auth');
       /*  $a = $request -> all(); */

        $pass = $request->pass;

        $passnew = Hash::make($request->passwordnew);

        $configuration = Admin::where('name','admin')->first();
        $pass_hash = $configuration -> password;

        if( Hash::check( $pass, $pass_hash) == false) {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin.");
          } else {
            // Password is matching
            $configuration = Admin::where('name','admin')->first()->update([
                "password"  =>      $passnew,
            ]);

            if (!is_null($configuration)) {
                Auth::guard('admin')->logout();
                Session::flush();
                return back()->with("success", "Cập nhật mật khẩu thành công. Vui lòng đăng xuất !!!");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin");
            }

          }
    }
}
