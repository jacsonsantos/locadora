@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col col-md-9 col-md-offset-1">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible m-top-15" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Aviso!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
<header class="main-filme">
    <div class="container">
        <h1 class="h1">Cadastro</h1>
    </div>
</header>
<section class="m-top-15">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $filme->int_filme_id}}" name="int_filme_id">
        <div class="row">
            <div class="col col-md-6 col-md-offset-1">
                <label for="Nome do Filme">Nome do Filme:</label>
                <input type="text" name="filme" value="{{ $filme->str_titulo_filme }}" required class="form-control">
            </div>
            <div class="col col-md-3">
                <label for="Categoria">Categoria:</label>
                <select name="categoria" required id="" class="form-control">
                        <option value="">Selecione uma categoria</option>
                    @foreach( $categorias as $categoria)
                        <option value="{{ $categoria->int_categoria_id }}" {{ ($categoria->int_categoria_id == $filme->int_categoria_id) ? 'selected' : ''}}>{{ $categoria->str_nome_categoria }}</option>
                    @endforeach()
                </select>
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-2 col-md-offset-1">
                <label for="Volume">Volume:</label>
                <input type="text" name="volume" value="{{ $filme->int_volume }}" required class="form-control">

            </div>
            <div class="col col-md-2">
                <label for="Faixa Etária">Faixa Etária:</label>
                <select type="text" name="faixa" value="" required class="form-control">
                    <option value="">Selecione a faixa etária</option>
                    <option value="L" {{($filme->str_faixa =='L')?'selected':''}}>Livre</option>
                    <option value="12" {{($filme->str_faixa =='12')?'selected':''}}>12</option>
                    <option value="14" {{($filme->str_faixa =='14')?'selected':''}}>14</option>
                    <option value="16" {{($filme->str_faixa =='16')?'selected':''}}>16</option>
                    <option value="18" {{($filme->str_faixa =='18')?'selected':''}}>18</option>

                </select>                
            </div>
            <div class="col col-md-2">
                <label for="Ano">Ano:</label>
                <input type="text" name="ano" id="ano" data-placeholder="yyyy" value="{{ $filme->int_ano }}" class="form-control">
            </div> 
            <div class="col col-md-2">
            <label for="Duração">Duração:</label>
                <input type="text" name="duracao" id="duracao" value="{{ $filme->str_duracao }}" class="form-control">
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-9 col-md-offset-1">
                <label for="Sinopse">Sinopse:</label>
            <textarea name="sinopse" id="" rows="6" class="form-control">{{ $filme->txt_sinopse_filme }}</textarea>
            </div>
            <div class="col col-md-9 col-md-offset-1 m-top-15">
                <label for="Trailer">Link do Trailer:</label>
            <input type="text" name="trailer" value="{{ $filme->str_trailer_filme }}" class="form-control">
            </div>
            
        </div>
        <div class="row">
            <div class="col col-md-5 col-md-offset-1">
                <label for="Capa">Capa:</label>
                @if($filme->thumbnail)
                    <br>Abrir Capa: <a style="color:#761c19;" target="_blank" href="{{ '/uploads/'.$filme->thumbnail }}" title="{{$filme->str_titulo_filme }}">{{$filme->str_titulo_filme }}</a>
                    <br>
                @endif
            <input type="file" accept= image/* name="capa">
            </div>
            <div class="col col-md-3">
                <div class="col col-md-12">
                    <label for="Mídia">Vincular Mídia:</label>
                </div>
                <select name="midia" id="" class="col-md-12 selectChosen">
                    <option value="">Selecione uma Mídia...</option>
                @foreach($midias as $midia)
                    <option value="{{$midia->id_anexo}}" {{($midia->id_anexo === $anexo) ?'selected':'' }}>{{ $midia->str_anexo }}</option>
                @endforeach
                </select>
            </div>
        </div>

    <div class="container m-top-15">
        <div class="row">
            <div class="col col-md-2 col-md-offset-1">
                <button class="btn btn-block btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-disk
"></span></button>
            </div>
            <div class="col col-md-2">
                <button class="btn btn-block btn-default" type="reset"><span class="glyphicon glyphicon-repeat"></span></button>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection()