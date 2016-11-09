<?php

namespace App\Http\Controllers;

use App\Filme;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    public function getIndexSearch(Request $request)
    {
    	$filmes = [];

    	if ($request->has('s')) {
            $s = htmlentities($request->input('s'));
            $sql = "select * from filme where str_titulo_filme like ':s%'";
            $filmes = DB::select(DB::Raw($sql),['s'=>$s]);
    	}

    	return view('index',compact('filmes'));
    }
    public function getSearch(Request $request)
    {
        $filmes = [];
        $filmesArray = [];

        if ($request->has('s')) {
            $s = htmlentities($request->input('s'));
            $sql = "select *,c.str_nome_categoria from filme f inner join categoria c on c.int_categoria_id = f.int_categoria_id where str_titulo_filme like :s";
            $filmes = DB::Select(DB::Raw($sql),['s'=> $s.'%']);
        }

        foreach($filmes as $filme) {
            array_push($filmesArray,$filme);
        }

        header("Access-Control-Allow-Origin: *");
        return response()->json($filmesArray);
    }
    public function getViewSearch(Request $request,$id = null)
    {
        if (is_null($id)){
            return response()->json(['error'=>'Not Found']);
        }

        $filmes = [];
        $filmesArray = [];

            $sql = "select * from filme where int_filme_id = :id";
            $filmes = DB::Select(DB::Raw($sql), ['id' => $id]);

            foreach ($filmes as $filme) {
                array_push($filmesArray, $filme);
            }

        header("Access-Control-Allow-Origin: *");
        return response()->json($filmesArray);
    }
    public function getCatSearch(Request $request,$id = null)
    {
        if (is_null($id)){
            return response()->json(['error'=>'Not Found']);
        }

        $filmes = [];
        $filmesArray = [];

        if ($request->has('s')) {
            $s = $request->input('s');
            $sql = "select * from filme where int_categoria_id = :id and str_titulo_filme like :s";
            $filmes = DB::Select(DB::Raw($sql), ['id' => $id, 's' => $s.'%']);

            foreach ($filmes as $filme) {
                array_push($filmesArray, $filme);
            }
        }

        header("Access-Control-Allow-Origin: *");
        return response()->json($filmesArray);
    }
    public function getCategory()
    {
        $categorys = [];
        $categorysArray = [];

            $sql = "select * from categoria";
            $categorys = DB::Select(DB::Raw($sql), []);

            foreach ($categorys as $category) {
                array_push($categorysArray, $category);
            }

        header("Access-Control-Allow-Origin: *");
        return response()->json($categorysArray);
    }
}
