<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informations;

class InformationController extends Controller
{
    //

public function informations()
{
/*      $news = DB::table('news')->select('*'); */
    $informations=informations::where('confirm', '=', 'false')->orderBy('id','desc')->paginate(8);
   /*  $news = $news->get(); */
    $stt=1;
    $pageNames = 'Tên Trang - Informations';
    return view('admin.informations', compact('informations', 'pageNames', 'stt') ,[
    ]);
}

public function informations_confirm()
{
/*      $news = DB::table('news')->select('*'); */
    $informations=informations::where('confirm', '=', 'true')->orderBy('id','desc')->paginate(8);
   /*  $news = $news->get(); */
    $stt=1;
    $pageNames = 'Tên Trang - Informations';
    return view('/admin/informations-confirm', compact('informations', 'pageNames', 'stt') ,[
    ]);
}

public function Post()
{
    return view('home');
}


public function Insert(Request $request)
{
    // public/images

        $informations = new informations;
        $informations->name_customer = $request->input('name');
        $informations->phone_customer = $request->input('phone');
        $informations->address_customer =  $request->input('address');
        $informations->content_customer = $request->input('content');
        $informations->mail_customer = $request->input('mail');
        $informations->confirm='false';
        $informations->save();
        return redirect()->back()->with('status', 'informations Added Successfully');


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
    $informations = informations::where('id', '=', $id)->select('*')->first();
    $des = html_entity_decode($informations->description);
    return view('admin.informations-view', compact('informations', 'des'));
    //
}



public function update(Request $request, $id)
{
        $informations = informations::find($id);



         if($informations->confirm=='false')
        {
            $informations->confirm='true';

            $informations->save();

        }
        elseif($informations->confirm=='true')
        {
            $informations->confirm='false';

            $informations->save();
        }


        return redirect()->back()->with('status', 'update Successfully');
    //
}

/* public function show_confirm($id)
{
    $informations = informations::where('id', '=', $id)->select('*')->first();
    $des = html_entity_decode($informations->description);
    return view('informations-view', compact('informations', 'des'));
    //
} */

}
