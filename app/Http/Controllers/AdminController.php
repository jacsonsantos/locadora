<?php

namespace App\Http\Controllers;

use App\Filme;
use App\User;
use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $filmes = new Filme();
        $filmes = $filmes->select('str_titulo_filme','int_categoria_id','thumbnail','int_filme_id')
            ->orderBy('int_filme_id','desc')
            ->get();
        $sql = "select * from categoria";
        $categorias = DB::select(DB::Raw($sql),[]);

    	return view('admin.index',compact('filmes','categorias'));
    }

    public function getAddMovie(Request $request,$id = null)
    {
        $filme = [];
        if (!is_null($id)) {
            $filme = Filme::find($id);
        } else {
            $filme = new Filme();
        }

    	$sql = "select * from categoria order by str_nome_categoria";
    	$categorias = DB::select(DB::Raw($sql),[]);

    	return view('admin.cadastro',compact('categorias','filme'));
    }

    public function postAddMovie(Request $request)
    {
    	$filme = new Filme();

    	$filme->str_titulo_filme = $request->input('filme');
    	$filme->int_categoria_id = $request->input('categoria');
    	$filme->txt_sinopse_filme = $request->input('sinopse');
    	$capa = $request->file('capa');
        $newName = md5($capa->getClientOriginalName());
        $ext = $capa->getClientOriginalExtension();
    	$filme->thumbnail = $newName.'.'.$ext;
    	$filme->str_trailer_filme = $request->input('trailer');
    	if (!$filme->save() || !$capa->move(public_path().'/uploads',$newName)){
    	    return redirect()->back()->withErrors(['Error'=>'Erro ao salvar filme']);
        }
    	return redirect('/admin')->withErrors(['Success'=>'Salvo com sucesso!']);
    }

    public function getDelete(Request $request, $id = null)
    {
        if (is_null($id)) {
           return redirect('/admin')->withErrors(['Error' => 'Erro, sem ID']);
        }

        $filme = Filme::find($id);
        $filme->delete();

        return redirect('/admin')->withErrors(['Success' => 'Filme apagado com sucesso!']);
    }

    public function getCreate()
    {
        return view('admin.register');
    }

    public function postCreate(Request $request)
    {
        $data = $request->all();
        if (User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ])) {
            return redirect('/admin/register')->withErrors(['success'=>'Usuario criado com sucesso!']);
        }

        return redirect('/admin/register')->withErrors(['error'=>'Erro ao Criar Usuario']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsers(Request $request)
    {
        $users = new Usuario();

        return view('admin.users',compact('users'));
    }
}
