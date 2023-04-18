<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Illuminate\Support\Str;
use App\Models\MetaBoxes;
use App\Models\Slug;

class TagsController extends Controller
{
    //

    //
    public function index()
    {
        $Tags = Tags::paginate(8);
        $stt = 1;
        $pageNames = 'Tên Trang - Tags';
        return view('admin.Tags.index' , compact('Tags', 'pageNames', 'stt'));
    }

    public function create_index()
    {
        return view('admin.Tags.create');

    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference_type = __CLASS__;
        $slug = Str::slug($request->name, '-');

        $Tag  =   Tags::create([
            "name" => $request->name,
            "slug" => $slug,
            "status" => $request->status,
            "title" => $request->title,
            "prefix" => "tags",
        ]);

        $MetaBoxes  =   MetaBoxes::create([
            "reference_id"  =>  $Tag->id,
            "meta_key" =>  "seo_meta",
            "meta_value" =>  json_encode($request->seo_meta),
            "reference_type" =>  $reference_type,
        ]);

        $Slug  =   Slug::create([
            "key" => $slug,
            "reference_id" => $Tag->id,
            "reference_type" => $reference_type,
            "prefix" => 'tags',
        ]);


        if (!is_null($MetaBoxes) && !is_null($Tag) && !is_null($slug)) {
            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $back = back();
        $tag = Tags::findOrFail($id);
        $pageName = 'Tags - Update';
        return view('admin.Tags.edit', compact('tag','back','pageName'));
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
        $slug = Str::slug($request->name, '-');

        $Tag = Tags::findOrFail($id)->update([
                "name" => $request->name,
                "slug" => $slug,
                "status" => $request->status,
                "title" => $request->title,
        ]);


        $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
        ->where('reference_type',  __CLASS__)
        ->update([
            "meta_value" =>  json_encode($request->seo_meta),
        ]);

        if (!is_null($MetaBoxes) && !is_null($Tag)) {
            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tag = Tags::where('id',$id)->first();

        $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
        ->where('reference_type',  __CLASS__)
        ->first();

        $Tag->delete();
        $MetaBoxes->delete();

        if (!is_null($Tag) && !is_null($MetaBoxes)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }



}
