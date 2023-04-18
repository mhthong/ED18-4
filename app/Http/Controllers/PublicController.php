<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\News;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Sliders;
use App\Models\Product;
use App\Models\InforCompany;
use App\Models\InforLink;
use Hamcrest\Core\AllOf;
use App\Models\StatisPost; */
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class PublicController extends Controller
{



    public function Home(){

/*         $seo_title = Setting::where('key','seo_title')->first();
        $seo_description = Setting::where('key','seo_description')->first();
        $seo_image = Setting::where('key','seo_image')->first(); */
       /*  public bài viết tĩnh */

/*         $StatisPost01 = StatisPost::where('id_ordinal', 1)->first();
        $StatisPost02 = StatisPost::where('id_ordinal', 2)->first();
        $StatisPost03 = StatisPost::where('id_ordinal', 3)->first();
        $StatisPost04 = StatisPost::where('id_ordinal', 4)->first();
        $StatisPost05 = StatisPost::where('id_ordinal', 5)->first();
        $StatisPost06 = StatisPost::where('id_ordinal', 6)->first();
        $StatisPost07 = StatisPost::where('id_ordinal', 7)->first();

        $news = News::select('*')->get();

        $Sliders = Sliders::select('*')->get();


        $InforCompany = InforCompany::first();

        $InforLink = InforLink::select('*'); */

        return view('home',/*  compact(
                                    'StatisPost01',
                                    'StatisPost02',
                                    'StatisPost03',
                                    'StatisPost04',
                                    'StatisPost05',
                                    'StatisPost06',
                                    'StatisPost07',
                                    'news',
                                    'Sliders',
                                    'InforCompany',
                                    'InforLink',
                                    'seo_title','seo_description','seo_image') */);
        }

    public function Public_Products()
    {



        $Product = Product::select('*');

        $Product = $Product->get();

        $pageName = 'San Pham Noi Bat';

        return view('layouts.card-slider', compact('Product' , 'pageName'));

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table,$id)
    {
        $Product = Product::findOrFail($id);
        return view('home', compact('news', 'des'));
        //
    }




        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Product_deatail($id)
    {
        $Product = Product::findOrFail($id);
        return view('', compact('Product', 'des'));
        //
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function one ($tittle,$id)
    {
        dd($tittle,$id);
        //
    }



    public function Public_News()
    {

        $news = news::select('*');

        $news = $news->get();

        $pageName = 'Tin Tuc Noi Bat Noi Bat';

        return view('home', compact('news' , 'pageName'));


    }

    //
}
