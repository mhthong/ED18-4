<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticPosts;

class StaticPostsController extends Controller
{
    //

    public function index()
    {
        $Static = StaticPosts::paginate(10);
        $stt = 1;
        $pageNames = 'Tên Trang';
        return view('admin.Static.index', compact('Static','pageNames', 'stt'));
    }

    public function create_index()
    {
        return view('admin.Static.create');
    }

    public function update(Request $request, $id)
    {


        $exists = StaticPosts::where('id', $id)
        ->where('name',  $request->name)
        ->exists();

        $exists_name = StaticPosts::where('name',  $request->name)
        ->exists();
        if(isset($request->pricelist))
        {
            $Static  =  StaticPosts::where('id',$id)->update([
                "pricelist" => json_encode( $request->pricelist)
            ]);
        }

        if ($exists) {
            # code...
            $Static  =  StaticPosts::where('id',$id)->update([
                "name" => $request->name,
                "status" =>  $request->status,
                "description" =>  $request->description,
                "content" =>  $request->content,
            ]);
        }
        elseif($exists_name)
        {
            return back()->with("failed", "Không Thể cập nhật . Tên nội dung đã tồn tại.");
        }
        else{
            $Static  =  StaticPosts::where('id',$id)->update([
                "name" => $request->name,
                "status" =>  $request->status,
                "description" =>  $request->description,
                "content" =>  $request->content,
            ]);
        }


            if (!is_null($Static) ) {

                return back()->with("success", "Cập nhật thông tin thành công.");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
            }


    }


    public function edit($id)
    {

        $Statics = StaticPosts::findOrFail($id);

        return view('admin.Static.edit', compact('Statics'));


    }


    public function upload(Request $request)
    {
    }


    public function store(Request $request)
    {

        $Static  =  StaticPosts::create([
            "name" => $request->name,
            "status" =>  $request->status,
            "description" =>  $request->description,
            "content" =>  $request->content,
            "alias" =>  $request->alias,
            "pricelist" => json_encode( $request->pricelist)
        ]);


        if (!is_null($Static) ) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        // Kiểm tra xem người dùng có upload file nên không

    }



        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $Static = StaticPosts::where('id',$id)->first();


        $Static->delete();


        if (!is_null($Static)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }
}
