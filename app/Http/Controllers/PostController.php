<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tags;
use App\Models\Categories;
use Illuminate\Routing\RouteGroup;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Slug;
use App\Models\MetaBoxes;
use Illuminate\Support\Str;



class PostController extends Controller
{
    public function index()
    {
        $Posts = Post::paginate(10);


        $Post = Post::select("*")->get();

        foreach ($Post  as   $Post) {
            # code...
            $Categories = Categories::where('posts_id', $Post->id)->get();

            foreach ($Categories as $key) {

                if ($key->categories_id !== 'null') {
                    foreach (json_decode($key->categories_id) as $categories_key => $value) {
                        $Menus_category[$Post->id][] = Menu::where('id', $value)->get();
                    }
                }
            }

        }



        $stt = 1;
        $pageNames = 'Tên Trang - Posts';
        return view('admin.Posts.index', compact('Posts', 'Menus_category', 'pageNames', 'stt'));
    }

    public function create_index()
    {
        return view('admin.Posts.create');
    }

    public function update(Request $request, $id)
    {


        $reference_type = __CLASS__;

        $img = $request->image;

        $eror_img = explode(env('APP_ENV'), $img);
        $image = end($eror_img);



        $slug = Str::slug($request->name, '-');

        $exists = Post::where('slug', $slug)
            ->where('id', $id)
            ->exists();
        $exists_slug = Post::where('slug', $slug)
            ->exists();

        if ($exists) {
            # code...
            $Post  =   Post::where('id', $id)->update([
                "status" =>  $request->status,
                "title" =>  $request->title,
                "content" =>  $request->content,
                "image" =>  $image,
                "target" =>   $request->is_featured,
                "tag" =>  $request->tag,
                "description" =>  $request->description,
                "prefix" =>  "posts",
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


            $Categories  =   Categories::where('posts_id', $id)->update([
                "categories_id" => json_encode($request->categories),
            ]);

            if (!is_null($Categories) &&  !is_null($Post) && !is_null($MetaBoxes) && !is_null($Slug)) {

                return back()->with("success", "Cập nhật thông tin thành công.");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
            }

            // Kiểm tra xem người dùng có upload file nên không
        } elseif ($exists_slug) {
            return back()->with("failed", "Tên bài viết của bạn đã tồn tại.Vui lòng kiểm tra lại !");
        } else {
            # code...
            $Post  =   Post::where('id', $id)->update([
                "name" => $request->name,
                "slug" =>  $slug,
                "status" =>  $request->status,
                "title" =>  $request->title,
                "content" =>  $request->content,
                "image" =>  $image,
                "target" =>   $request->is_featured,
                "tag" =>  $request->tag,
                "description" =>  $request->description,
                "prefix" =>  "posts",
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


            $Categories  =   Categories::where('posts_id', $id)->update([
                "categories_id" => json_encode($request->categories),
            ]);



            if (!is_null($Categories) &&  !is_null($Post) && !is_null($MetaBoxes) && !is_null($Slug)) {

                return back()->with("success", "Cập nhật thông tin thành công.");
            } else {
                return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
            }
        }
    }


    public function edit($id)
    {
        $back = back();
        $Posts = Post::findOrFail($id);
        $exists = Categories::where('posts_id', $id)->exists();

        if ($exists) {
            $Categories = Categories::where('posts_id', $id)->get();
            foreach ($Categories as $key => $value) {

                if (empty(json_decode($value->categories_id))) {
                    $pageName = 'Posts - Update';
                    return view('admin.Posts.edit', compact('Posts', 'back', 'pageName'));
                } else {
                    foreach (json_decode($value->categories_id) as $key_categories_id => $menu_id) {
                        $menu_check[$menu_id] = Menu::where('id', $menu_id)->first();
                    }
                    $pageName = 'Posts - Update';
                    return view('admin.Posts.edit', compact('Posts', 'back', 'pageName', 'menu_check'));
                }
            }
        }
    }


    public function upload(Request $request)
    {
    }


    public function store(Request $request)
    {

        $reference_type = __CLASS__;

        $img = $request->image;
        $eror_img = explode(env('APP_ENV'), $img);
        $image = end($eror_img);

        $slug = Str::slug($request->name, '-');

        $Post  =   Post::create([
            "name" => $request->name,
            "slug" =>  $slug,
            "status" =>  $request->status,
            "title" =>  $request->title,
            "content" =>  $request->content,
            "image" =>  $image,
            "target" =>   $request->is_featured,
            "reference_type" =>   $reference_type,
            "tag" =>  $request->tag,
            "description" =>  $request->description,
            "prefix" =>  "posts",
        ]);

        $MetaBoxes  =   MetaBoxes::create([
            "reference_id"  =>  $Post->id,
            "meta_key" =>  "seo_meta",
            "meta_value" =>  json_encode($request->seo_meta),
            "reference_type" =>  $reference_type,
        ]);

        $Slug  =   Slug::create([
            "key" => $slug,
            "reference_id" => $Post->id,
            "reference_type" => $reference_type,
            "prefix" => "posts",
        ]);


        $Categories  =   Categories::create([
            "posts_id" => $Post->id,
            "categories_id" => json_encode($request->categories),
        ]);


        if (!is_null($Post) && !is_null($Categories) && !is_null($MetaBoxes) && !is_null($Slug)) {

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


        $Post = Post::where('id', $id)->first();

        $MetaBoxes  =   MetaBoxes::where('reference_id', $id)
            ->where('reference_type',  __CLASS__)
            ->first();

        $Slug  =   Slug::where('reference_id', $id)
            ->where('reference_type', __CLASS__)
            ->first();

        $Categories  =   Categories::where('posts_id', $id)->first();




        $Categories->delete();
        $Slug->delete();
        $Post->delete();
        $MetaBoxes->delete();

        if (!is_null($Categories) && !is_null($Slug) && !is_null($Post) && !is_null($MetaBoxes)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }
}
