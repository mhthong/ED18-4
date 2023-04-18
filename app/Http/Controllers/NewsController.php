<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\StatisPost;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function index()
    {
        return view('admin.News');
    }

    public function news()
    {
        /*      $news = DB::table('news')->select('*'); */
        $news = News::paginate(8);
        /*  $news = $news->get(); */
        $stt = 1;
        $pageNames = 'Tên Trang - News';
        return view('/admin/news', compact('news', 'pageNames', 'stt'), []);
    }


    public function new_post()
    {
        return view('admin.news-post');
    }


    public function Insert_New(Request $request)
    {
        // public/images

        $news = new News;
        $news->tittle = $request->input('tittle');
        $news->description = $request->input('description');
        $news->images =  $request->input('filepath');
        $news->content = 'null';
        $news->save();

        if (!is_null($news)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

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
        $news = News::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($news->description);
        return view('news', compact('news', 'des'));
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
        $news = News::findOrFail($id);
        $pageName = 'News - Update';
        return view('admin.NewsEdit', compact('news', 'pageName'));
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

        $news = News::find($id);
        $news->tittle = $request->input('tittle');
        $news->description = $request->input('description');
        $news->images =  $request->input('filepath');
        $news->content = 'null';
        $news->save();

        if (!is_null($news)) {

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
        $news = News::find($id);

        $news->delete();


        if (!is_null($news)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }

    /*     public function show($id)
    {
        $news = News::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($news->description);
        return view('/admin/news_detail', compact('news', 'des'));
    } */

}
