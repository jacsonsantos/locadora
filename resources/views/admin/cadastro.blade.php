@extends('layouts.app')
@section('content')
<header class="main-filme">
    <div class="container">
        <h1 class="h1">Cadastro</h1>
    </div>
</header>
<section class="m-top-15">
    <form action="" method="post" enctype="multipart/form-data">
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
            <div class="col col-md-9 col-md-offset-1">
                <label for="Sinopse">Sinopse:</label>
            <textarea name="sinopse" id="" required rows="6" class="form-control">{{ $filme->txt_sinopse_filme }}</textarea>
            </div>
            <div class="col col-md-9 col-md-offset-1 m-top-15">
                <label for="Trailer">Link do Trailer:</label>
            <input type="text" name="trailer" value="{{ $filme->str_trailer_filme }}" required class="form-control">
            </div>
            <div class="col col-md-9 col-md-offset-1">
                <label for="Capa">Capa:</label>
                @if($filme->thumbnail)
                <div class="thumb">
                    <img class="img-responsive" src="{{ public_path().'/uploads/'.$filme->thumbnail }}" alt="{{$filme->str_titulo_filme }}">
                </div>
                @endif
            <input type="file" accept= image/* name="capa" required>
            </div>
        </div>
    <div class="container m-top-15">
        <div class="row">
            <div class="col col-md-2 col-md-offset-1">
                <button class="btn btn-block btn-primary" type="submit">Salvar <span class="glyphicon glyphicon-floppy-disk
"></span></button>
            </div>
            <div class="col col-md-2">
                <button class="btn btn-block btn-default" type="reset">Reiniciar <span class="glyphicon glyphicon-repeat"></span></button>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection()