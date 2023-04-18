<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{

      //
    /**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit()
{
    $id=1;
    $contacts= Contact::findOrFail($id);
    $pageName = 'Contact - Update';
    return view('admin.ContactsEdit', compact('contacts', 'pageName'));
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{
        $id=1;
        $contacts = Contact::find($id);
        $contacts->link =  $request->input('link');
        $contacts->text =  $request->input('text');
        $contacts->maps =  $request->input('maps');
        $contacts->save();
        return redirect()->back()->with('status', 'update Successfully');

    //
}
    //
}
