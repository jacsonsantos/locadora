@extends('layouts.app')
@section('content')
<header class="main-filme">
    <div class="container m-top-15">
        <form action="">
        <div class="row">
            <div class="col col-md-4">
                <label for="Filme">Filme:</label>
                <input type="text" name="filter_filme" class="form-control">
            </div>
            <div class="col col-md-4">
                <label for="Categoria">Categoria:</label>
                <select name="filter_categoria" id="" class="form-control">
                    <option value="">Selecione um Categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->int_categoria_id }}">{{ $categoria->str_nome_categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-md-2">
                <label for="">&nbsp;</label>
                <button class="btn btn-primary btn-block">Filtrar <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container m-top-15">
        <div class="col col-md-2">
            <a href="/admin/add/movie" class="btn btn-success btn-block">Adicionar Filme <span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </div>
</header>
<section style="position: absolute;">
    <table class="table">
        <thead class="bg-tb">
            <tr class="">
                    <th width="150px">Capa</th>
                    <th class="col-md-3">Filme</th>
                    <th class="col-md-3">Categoria</th>
                    <th class="col-md-3">Status</th>
                    <th width="150px" style="overflow: auto">Ação</th>
            </tr>
        </thead>
    <tbody class="table-striped">
@foreach($filmes as $filme)
        <tr class="">
            <td width="150px">
                <img src="{{ public_path().'/uploads/'.$filme->thumbnail }}" title="{{ $filme->str_titulo_filme }}" alt="{{ $filme->str_titulo_filme }}" class="img-responsive">
            </td>
            <td class="col-md-3"><span>{{ $filme->str_titulo_filme }}</span></td>
            <td class="col-md-3"><span>{{ $filme->int_categoria_id }}</span></td>
            <td class="col-md-2"><span>Disponível</span></td>
            <td width="150px">
                <div style="padding-top: 5px">
                <button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
                </div>
                <div style="padding-top: 5px">
                <a href="/admin/add/movie/{{ $filme->int_filme_id }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                </div>
                <div style="padding-top: 5px">
                <a href="/admin/delete/{{ $filme->int_filme_id }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
    </table>
</section>
@endsection()