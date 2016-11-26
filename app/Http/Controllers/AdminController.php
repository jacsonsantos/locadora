<?php

namespace App\Http\Controllers;

use App\Filme;
use App\User;
use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        if (Auth::user()->int_acesso == '3' || empty(Auth::user()->int_acesso)) {
            return redirect('/admin/my-film');
        }

        $filmes = new Filme();
        $filmes = $filmes->select('str_titulo_filme','int_ano','filme.int_categoria_id','thumbnail','int_filme_id','str_nome_categoria')
            ->join('categoria','filme.int_categoria_id','=','categoria.int_categoria_id')
            ->orderBy('int_filme_id','desc')
            ->get();

        $sql = "select * from categoria";
        $categorias = DB::select(DB::Raw($sql),[]);

    	return view('admin.index',compact('filmes','categorias'));
    }

    public function getMyFilm(Request $request)
    {

        if ($request->has('tmp')) {
            $tmp = $request->input('tmp');
            $vincular_user = DB::table('user_filme')->insert(
                [
                    'id_filme'=>$tmp,
                    'id_user'=>Auth::user()->id,
                ]
            );
            return redirect('/admin/my-film');
        }

        $sql = "select * from user_filme
                inner join filme on int_filme_id = id_filme
                where id_user = :id";
        $alugados =  DB::select(DB::Raw($sql),['id'=>Auth::user()->id]);

        $sql = "select * from categoria";
        $categorias = DB::select(DB::Raw($sql),[]);

        return view('admin.myFilm',compact('categorias','alugados'));
    }

    public function getProfile(Request $request)
    {
        $user = Auth::user();

        return view('admin.profile',compact('user'));
    }

    public function postProfile(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->input('id');

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->sobrenome = $request->input('sobrenome');
            $foto = $request->file('foto');
            $newFoto = md5($foto->getClientOriginalName()).'.'.$foto->getClientOriginalExtension();
            $user->foto = $newFoto;
            $user->mimetype = $foto->getClientMimeType();
            if ($user->save()) {
                if ($foto->move(public_path().'/uploads',$newFoto)) {
                    return redirect('/admin/profile')->withErrors(['success'=> 'Alteração Salva']);
                }
            }
        }

        return view('admin.profile',compact('user'));
    }

    public function getAddMovie(Request $request,$id = null)
    {
        if (!is_null($id)) {
            $filme = Filme::find($id);
        } else {
            $filme = new Filme();
        }

    	$sql = "select * from categoria order by str_nome_categoria";
    	$categorias = DB::select(DB::Raw($sql),[]);

        $sql = "select id_anexo,str_anexo from anexo order by str_anexo";
        $midias = DB::select(DB::Raw($sql),[]);

        $anexo = '';
        if ($filme->int_filme_id) {
            $sql = "SELECT a.id_anexo FROM filme_anexo f
                inner JOIN anexo a on a.id_anexo = f.id_anexo
                WHERE f.id_filme = :id";
            $anexo = DB::select(DB::Raw($sql), ['id' => $filme->int_filme_id]);
            $anexo = $anexo[0]->id_anexo;
        }
    	return view('admin.cadastro',compact('categorias','filme','midias','anexo'));
    }

    public function postAddMovie(Request $request)
    {
        if ($request->input('int_filme_id')) {
            $filme = Filme::find($request->input('int_filme_id'));
        } else {
            $filme = new Filme();
        }
    
    	$filme->str_titulo_filme = $request->input('filme');
    	$filme->int_categoria_id = $request->input('categoria');
    	$filme->txt_sinopse_filme = $request->input('sinopse');
    	$filme->int_volume = $request->input('volume');
    	$filme->str_faixa = $request->input('faixa');
    	$filme->int_ano = $request->input('ano');
    	$filme->str_duracao = $request->input('duracao');

        if (!empty($request->file('capa'))) {
            $capa = $request->file('capa');
            $newName = md5($capa->getClientOriginalName());
            $ext = $capa->clientExtension();
            $filme->thumbnail = $newName.'.'.$ext;
            
            if (!$capa->move(public_path().'/uploads',$newName.'.'.$ext)){
                return redirect()->back()->withErrors(['Error'=>'Erro ao salvar filme']);
            }
        }
    	
        $filme->str_trailer_filme = $request->input('trailer');
    	
        if (!$filme->save()){
    	    return redirect()->back()->withErrors(['Error'=>'Erro ao salvar filme']);
        }

        DB::table('filme_anexo')->insert(
            [
                'id_filme' => $filme->int_filme_id,
                'id_anexo' => $request->input('midia')
            ]);
    	
        return redirect('/admin')->withErrors(['Success'=>'Salvo com sucesso!']);
    }

    public function getDelete(Request $request, $id = null)
    {
        if (is_null($id)) {
           return redirect('/admin')->withErrors(['Error' => 'Erro, sem ID']);
        }

        $filme = Filme::find($id);
        $filename = $filme->thumbnail;
        if ($filme->delete()) {
            unlink(public_path().'/uploads/'.$filename);
        }

        return redirect('/admin')->withErrors(['Success' => 'Filme apagado com sucesso!']);
    }

    public function getCreate()
    {
        return view('admin.register');
    }

    public function postCreate(Request $request)
    {
        $data = $request->all();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->int_acesso = $data['acesso'];
        if ($user->save()) {
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

        $users = $users->all();

        return view('admin.users',compact('users'));
    }
    public function getDeleteUser(Request $request, $id = null)
    {
        if (is_null($id)) {
            return redirect('/admin')->withErrors(['Error' => 'Erro, sem ID']);
        }

        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users')->withErrors(['Success' => 'Usuario apagado com sucesso!']);
    }
    public function getAnexo(Request $request)
    {
        return view('admin.anexo');
    }
    public function postAnexo(Request $request)
    {
        if($request->has('str_anexo'))
            $str_anexo = $request->input('str_anexo');

        if($request->has('anexo'))
            $anexo = $request->input('anexo');

        if (isset($str_anexo) && isset($anexo)) {
            $mimetype = mime_content_type(public_path().'/filmes/'.$anexo);
            $tableAnexo = DB::table('anexo');
            if ($tableAnexo->insert(
                [
                   'str_anexo'=>$str_anexo,
                   'anexo'=> $anexo,
                   'mimetype'=>$mimetype,
                ])) {
                return redirect('/admin/anexo')->withErrors(['success'=> 'Anexo Armazenado']);
            }
        }

        return abort(404);
    }
}
