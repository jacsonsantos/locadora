<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function getIndexSearch(Request $request)
    {
    	$filmes = [];

    	if ($request->has('s')) {
            $s = htmlentities($request->input('s'));
            $sql = "select * from filme where str_nome_filme like ':s%'";
            $filmes = DB::select(DB::Raw($sql),['s'=>$s]);
    	}

    	return view('index',compact('filmes'));
    }
}
