<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{

    //
    /*   public function index()
    {
        return view('admin.NewsManagement');
    }
 */
    public function index()
    {
        /*      $news = DB::table('news')->select('*'); */
        $products = Product::paginate(8);
        /*  $news = $news->get(); */
        $stt = 1;
        $pageNames = 'Tên Trang - Product';
        return view('', compact('products', 'pageNames', 'stt'), []);
    }

    public function product()
    {
        /*      $news = DB::table('news')->select('*'); */
        $products = Product::paginate(8);
        /*  $news = $news->get(); */
        $stt = 1;
        $pageNames = 'Tên Trang - Product';
        return view('/admin/products', compact('products', 'pageNames', 'stt'), []);
    }


    public function Post()
    {
        return view('admin.products-post');
    }


    public function Insert(Request $request)
    {
        // public/images

        $products = new Product;
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $path=  $request->input('filepath');
        $tokens = explode('/', $path);
        $products->images = $tokens["7"];
        $products->price = $request->input('price');
        $products->images_one = "";
        $products->images_two = "";
        $products->images_three = "";

        $products->save();
        return redirect()->back()->with('status', 'Product Added Successfully');


        //insert News DB


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($products->description);
        return view('products', compact('news', 'des'));
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
        $products = Product::findOrFail($id);
        $pageName = 'products - Update';
        return view('admin.productsEdit', compact('products', 'pageName'));
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
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $path=  $request->input('filepath');
        $tokens = explode('/', $path);
        $products->images = $tokens["7"];
        $products->price = $request->input('price');
        $products->images_one = "";
        $products->images_two = "";
        $products->images_three = "";

        $products->save();
        return redirect()->back()->with('status', 'update Successfully');

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
        $news = Product::find($id);

        $news->delete();

        return redirect()->back()->with('status', 'Student delete Successfully');
        //
    }

    /*     public function show($id)
{
    $news = News::where('id', '=', $id)->select('*')->first();
    $des = html_entity_decode($news->description);
    return view('/admin/news_detail', compact('news', 'des'));
} */
}
