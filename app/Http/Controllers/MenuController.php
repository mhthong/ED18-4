<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuNode;
use App\Models\MenuLocation;
use App\Models\Slug;
use App\Models\MetaBoxes;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use League\CommonMark\Extension\Mention\Mention;
use PhpParser\Builder\Class_;
use PhpParser\Builder\Namespace_;
use App\Http\ViewComposers\MovieComposer;
use Illuminate\Routing\Controller;


class MenuController extends Controller
{
    //
    public function index()
    {

        return view('admin.category');
    }

    public function store(Request $request)
    {
        $reference_type = __CLASS__;

        $img = $request->image;
        $eror_img = explode(env('APP_ENV'), $img);
        $image = end($eror_img);

        $slug = Str::slug($request->name, '-');

        $Menu  =   Menu::create([
            "name" => $request->name,
            "slug" =>  $slug,
            "status" =>  $request->status,
        ]);

        $MenuLocation  =   MenuLocation::create([
            "menu_id" => $Menu->id,
            "location" => $request->order,
        ]);

        if ($request->parent_id == 0) {
            $has_child = 1;
        } else {
            $has_child = 0;
        }

        $MenuNode  =   MenuNode::create([
            "menu_id" => $Menu->id,
            "parent_id" =>  $request->parent_id,
            "reference_id"  =>  $Menu->id,
            "reference_type" =>   $reference_type,
            "url" =>  "#" . $slug,
            "icon_font" =>  $request->icon_font,
            "position" =>  "",
            "title" =>  $request->description,
            "css_class" =>  $image,
            "target" =>   $request->is_featured,
            "has_child" =>  $has_child,

        ]);

        $MetaBoxes  =   MetaBoxes::create([
            "reference_id"  =>  $Menu->id,
            "meta_key" =>  "seo_meta",
            "meta_value" =>  json_encode($request->seo_meta),
            "reference_type" =>  $reference_type,
        ]);

        $Slug  =   Slug::create([
            "key" => $slug,
            "reference_id" => $Menu->id,
            "reference_type" => $reference_type,
            "prefix" => "caretoties",
        ]);


        if (!is_null($MenuNode) && !is_null($MenuLocation) && !is_null($Menu) && !is_null($MetaBoxes) && !is_null($slug)) {
            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }
    }




    public function Category()
    {
        $Category = Menu::paginate(8);
        $stt = 1;
        $pageNames = 'Tên Trang - Category';
        return view('admin.Category', compact('Category', 'pageNames', 'stt'));
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

        $reference_type = __CLASS__;

        $slug = Str::slug($request->name, '-');


        $img = $request->image;


        if ($img == "null") {
            $MenuNode  =   MenuNode::where('menu_id', $id)->where('reference_type', $reference_type)->update([
                "parent_id" =>  $request->parent_id,
                "url" =>  "#" . $slug,
                "icon_font" =>  $request->icon_font,
                "position" =>  $request->order,
                "title" =>  $request->description,
                "target" =>   $request->is_featured,
            ]);
        } else {
            $eror_img = explode(env('APP_ENV'), $img);
            $image = end($eror_img);

            $MenuNode  =   MenuNode::where('menu_id', $id)->where('reference_type', $reference_type)->update([
                "parent_id" =>  $request->parent_id,
                "url" =>  "#" . $slug,
                "icon_font" =>  $request->icon_font,
                "position" =>  $request->order,
                "title" =>  $request->description,
                "css_class" =>  $image,
                "target" =>   $request->is_featured,
            ]);
        }





        $Menu  =   Menu::where('id', $id)->update([
            "name" => $request->name,
            "slug" =>  $slug,
            "status" =>  $request->status,
        ]);

        $MenuLocation  =   MenuLocation::where('menu_id', $id)->update([
            "location" =>  $request->order,
        ]);



        $MetaBoxes  =   MetaBoxes::where('reference_id', $id)->where('reference_type', $reference_type)->update([
            "meta_key" =>  "seo_meta",
            "meta_value" =>  json_encode($request->seo_meta),
        ]);

        $Slug  =   Slug::where('reference_id', $id)->where('reference_type', $reference_type)->update([
            "key" => $slug,

        ]);

        if (!is_null($MenuNode) && !is_null($MenuLocation) && !is_null($Menu) && !is_null($MetaBoxes) && !is_null($slug)) {

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
        ///$id = menu_id MenuNode &&  /$id = id Menu && $id = menu_id Menulocation


        $destroy = Menu::find($id);

        $isExist = MenuNode::where("parent_id", $id)->exists();

        $MenuLocation = MenuLocation::where("menu_id", $id)->first();


        if ($isExist) {

            $count = MenuNode::where("parent_id", $id)->count();

            $MenuNode = MenuNode::where("parent_id", $id)->get();

            foreach ($MenuNode as $key => $QueryMenuNode) {
                $a = $QueryMenuNode->menu_id;

                $Menus = Menu::where("id", $a)->first();

                $isExistMetaBoxesMenus = MetaBoxes::where("reference_type", __CLASS__)
                ->where("reference_id", $Menus ->id)
                ->exists();

                if ($isExistMetaBoxesMenus) {

                    $MetaBoxesMenus = MetaBoxes::where("reference_type", __CLASS__)
                    ->where("reference_id",  $Menus ->id)
                    ->first();

                    $MetaBoxesMenus->delete();
                }

                $isExistSlug = Slug::where("reference_type", __CLASS__)
                ->where("key", $Menus ->slug)
                ->exists();

                if ($isExistSlug) {
                    $Slug = Slug::where("reference_type", __CLASS__)
                    ->where("key", $Menus ->slug)
                    ->where("reference_id",  $Menus ->id)
                    ->first();

                    $Slug->delete();
                }

                $Menus->delete();
                $QueryMenuNode->delete();
            }

        }


        $isExistMetaBoxes = MetaBoxes::where("reference_type", __CLASS__)
        ->where("reference_id", $destroy->id)
        ->exists();

        if ($isExistMetaBoxes) {
            $MetaBoxes = MetaBoxes::where("reference_type", __CLASS__)
            ->where("reference_id", $destroy->id)
            ->first();
            $MetaBoxes->delete();
        }


        $destroy->delete();

        $MenuLocation->delete();



        if (!is_null($destroy)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }

    /*     public function show($id)
    {
        $Category = Category::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($Category->description);
        return view('/admin/Category_detail', compact('Category', 'des'));
    } */
}
