<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\MetaBoxes;
use App\Models\Slug;
use Illuminate\Support\Str;


class BlockController extends Controller
{
    //



    public function page($slug){

        $page = Block::select("*")->where('slug', $slug)->get();
        return response()->view('layouts.page', [
            'page' => $page,
        ])->header('Content-Type', 'text/html');
    }



    public function index()
    {
        $Block = Block::paginate(10);
        $stt = 1;
        $pageNames = 'Tên Trang - Block';
        return view('admin.Block.index', compact('Block', 'pageNames', 'stt'));
    }

    public function create_index()
    {
        return view('admin.Block.create');
    }

    public function update(Request $request, $id)
    {
        $reference_type = __CLASS__;

        if(empty($request->image))
            {
                $img = $request->image;
                $eror_img = explode(env('APP_ENV'), $img);
                $image = end($eror_img);
            }
        else{
                $image = $request->image;
            }

        $slug = Str::slug($request->name, '-');

        $exists = Block::where('slug', $slug)
            ->where('id', $id)
            ->exists();


            $exists_slug = Block::where('slug', $slug)
            ->exists();

        if ($exists) {
            # code...
            $Block  =   Block::where('id', $id)->update([
                "name" => $request->name,
                "slug" =>  $slug,
                "status" =>  $request->status,
                "description" =>  $request->description,
                "content" =>  $request->content,
                "image" =>  $image,
                "target" =>   $request->is_featured,
            ]);

            $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
                ->where('reference_type', $reference_type)
                ->update([
                    "meta_key" =>  "seo_meta",
                    "meta_value" =>  json_encode($request->seo_meta),
                ]);

            $Slug  =   Slug::where('reference_id', $id)
                ->where('reference_type', $reference_type)
                ->update([
                    "key" => $slug,
                ]);

            if (!is_null($Block) && !is_null($MetaBoxes) && !is_null($Slug)) {

                return back()->with("success", "Cập nhật thông tin thành công.");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
            }

            // Kiểm tra xem người dùng có upload file nên không
        }
        elseif($exists_slug)
        {
            return back()->with("failed", "Tên bài viết của bạn đã tồn tại.Vui lòng kiểm tra lại !");
        }
        else{
 /*            dd($request->all()); */
            # code...
            $Block  =   Block::where('id', $id)->update([
                "name" => $request->name,
                "slug" =>  $slug,
                "status" =>  $request->status,
                "description" =>  $request->description,
                "content" =>  $request->content,
                "image" =>  $image,
                "target" =>   $request->is_featured,
            ]);

            $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
                ->where('reference_type', $reference_type)
                ->update([
                    "meta_key" =>  "seo_meta",
                    "meta_value" =>  json_encode($request->seo_meta),
                ]);

            $Slug  =   Slug::where('reference_id', $id)
                ->where('reference_type', $reference_type)
                ->update([
                    "key" => $slug,
                ]);




            if (!is_null($Block) && !is_null($MetaBoxes) && !is_null($Slug)) {

                return back()->with("success", "Cập nhật thông tin thành công.");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
            }
        }


    }


    public function edit($id)
    {
        $Blocks = Block::findOrFail($id);
        $MetaBoxes = MetaBoxes::where("reference_id",$id)
        ->where("reference_type",__CLASS__)
        ->get();

        return view('admin.Block.edit', compact('Blocks','MetaBoxes'));
    }


    public function upload(Request $request)
    {

    }


    public function store(Request $request)
    {


        $reference_type = __CLASS__;

        if(empty($request->image))
            {
                $img = $request->image;
                $eror_img = explode(env('APP_ENV'), $img);
                $image = end($eror_img);
            }
        else{
                $image = $request->image;
            }

        $slug = Str::slug($request->name, '-');

        $Block  =   Block::create([
            "name" => $request->name,
            "slug" =>  $slug,
            "alias"=> "",
            "status" =>  $request->status,
            "description" =>  $request->description,
            "content" =>  $request->content,
            "image" =>  $image,
            "target" =>   $request->is_featured,

        ]);

        $MetaBoxes  =   MetaBoxes::create([
            "reference_id"  =>  $Block->id,
            "meta_key" =>  "seo_meta",
            "meta_value" =>  json_encode($request->seo_meta),
            "reference_type" =>  $reference_type,
        ]);

        $seo_meta=$request->seo_meta;

        $Slug  =   Slug::create([
            "key" => $slug,
            "reference_id" => $Block->id,
            "reference_type" => $reference_type,
            "prefix" => "page",
        ]);



        if (!is_null($Block) && !is_null($MetaBoxes) && !is_null($Slug)) {

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




        $Block = Block::where('id',$id)->first();

        $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
        ->where('reference_type',  __CLASS__)
        ->first();

        $Slug  =   Slug::where('reference_id', $id)
        ->where('reference_type', __CLASS__)
        ->first();

        $Block->delete();
        $Slug->delete();
        $MetaBoxes->delete();

        if (!is_null($Slug) && !is_null($Block) && !is_null($MetaBoxes)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }

}
