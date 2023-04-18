<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleSlider;
use App\Models\SimpleSliderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SimpleSliderController extends Controller
{
    //
    public function index()
    {
        return view('admin.SimpleSlider');
    }

    public function SimpleSlider()
    {
        $SimpleSlider = SimpleSlider::paginate(8);
        $stt = 1;
        $pageNames = 'Tên Trang - SimpleSlider';
        return view('admin.SimpleSlider', compact('SimpleSlider', 'pageNames', 'stt'));
    }


    public function new_post()
    {
        return view('admin.SimpleSlider-post');
    }


    public function Insert_New(Request $request)
    {
        // public/images

        $SimpleSlider = new SimpleSlider;
        $SimpleSlider->tittle = $request->input('tittle');
        $SimpleSlider->description = $request->input('description');
        $SimpleSlider->images =  $request->input('filepath');
        $SimpleSlider->content = 'null';
        $SimpleSlider->save();

        if (!is_null($SimpleSlider)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //insert SimpleSlider DB


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SimpleSlider = SimpleSlider::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($SimpleSlider->description);
        return view('SimpleSlider', compact('SimpleSlider', 'des'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_slider = SimpleSlider::findOrFail($id);
        $SimpleSliderItem = SimpleSliderItem::where('simple_slider_id', $id)->orderBy('order','asc')->get();
        $stt =1;
        return view('admin.SimpleSliderEdit', compact('data_slider' , 'SimpleSliderItem','stt'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $configuration  =   SimpleSlider::where('id', $id)->update([
            "name" =>  $request->name,
            "key" =>  $request->key,
            "description" =>  $request->description,
            "status" =>  $request->status,
        ]);

        if (!is_null($configuration)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }


        //
    }



        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateitem(Request $request, $id)
    {

        $isOder = SimpleSliderItem::select("order")
        ->where('id', $id)->get();

        foreach($isOder as $isOder){
            $order_old= $isOder->order;
        }

        $img = $request->image;
        $eror_img = explode(env('APP_ENV'),$img);
        $image=end($eror_img);

        $order = $request->order;
        $isExist = SimpleSliderItem::select("*")
        ->where('order',$order)
        ->exists();

        if($isExist){

            $configuration  =   SimpleSliderItem::where('order',$order)->update([
                "order" => $order_old,
            ]);

        }


        $configuration  =   SimpleSliderItem::where('id', $id)->update([
            "title" => $request->title,
            "link" =>  $request->link,
            "description" =>  $request->description,
            "order" =>  $request->order,
            "image" =>  $image,
        ]);

        if (!is_null($configuration)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }


        //
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createditem(Request $request,$id_simple)
    {

    /*     dd($request->all(),$id_simple); */
        $img = $request->image;
        $eror_img = explode(env('APP_ENV'),$img);
        $image=end($eror_img);

        $configuration  =   SimpleSliderItem::create([
            "simple_slider_id" => $id_simple,
            "title" => $request->title,
            "link" =>  $request->link,
            "description" =>  $request->description,
            "order" =>  $request->order,
            "image" =>  $image,
        ]);

        if (!is_null($configuration)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SimpleSliderItem = SimpleSliderItem::find($id);

        $SimpleSliderItem->delete();


        if (!is_null($SimpleSliderItem)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }

    /*     public function show($id)
    {
        $SimpleSlider = SimpleSlider::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($SimpleSlider->description);
        return view('/admin/SimpleSlider_detail', compact('SimpleSlider', 'des'));
    } */

}
