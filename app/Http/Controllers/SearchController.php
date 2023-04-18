<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Tags;

class SearchController extends Controller
{
    //
    public function find(Request $request) {

        $Tags = Tags::where('name', 'like', '%' . $request->get('q') . '%')->get();
        return response()->json($Tags);
      }
}
