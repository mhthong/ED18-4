<?php

namespace App\Http\Controllers;
use App\Models\FormContact;
use Illuminate\Http\Request;

class FormContactController extends Controller
{

    public function index()
    {
        return view('admin.FormContact');
    }

    public function FormContact()
    {

        /* $FormContact = DB::table('FormContact')->select('*'); */
        $FormContact = FormContact::paginate(8);
        /*  $FormContact = $FormContact->get(); */
        $stt = 1;
        $pageNames = 'Tên Trang - FormContact';
        return view('admin.FormContact', compact('FormContact', 'pageNames', 'stt'), []);


    }


    public function search(request $require)
    {

            $search = $require -> search;

            /* $FormContact = DB::table('FormContact')->select('*'); */
            $FormContact = FormContact::query()
            ->where('email', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->paginate(8);
            /*  $FormContact = $FormContact->get(); */
            $stt = 1;
            $pageNames = 'Tên Trang - FormContact';
            return view('admin.search', compact('FormContact', 'pageNames', 'stt' ,'search'), []);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FormContact = FormContact::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($FormContact->description);
        return view('FormContact', compact('FormContact', 'des'));
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
        $FormContact = FormContact::findOrFail($id);
        $pageName = 'FormContact - Update';
        return view('admin.FormContactEdit', compact('FormContact', 'pageName'));
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

        $FormContact = FormContact::find($id);
        $FormContact->tittle = $request->input('tittle');
        $FormContact->description = $request->input('description');
        $FormContact->images =  $request->input('filepath');
        $FormContact->content = 'null';
        $FormContact->save();

        if (!is_null($FormContact)) {

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
        $FormContact = FormContact::find($id);

        $FormContact->delete();


        if (!is_null($FormContact)) {

            return back()->with("success", "Cập nhật thông tin thành công.");
        } else {
            return back()->with("failed", "Không Thể cập nhật . Vui lòng kiểm tra thông tin thành công.");
        }

        //
    }

    /*     public function show($id)
    {
        $FormContact = FormContact::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($FormContact->description);
        return view('/admin/FormContact_detail', compact('FormContact', 'des'));
    } */



}
