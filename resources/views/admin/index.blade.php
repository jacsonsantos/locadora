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
<section>
    <div class="col col-md-9 col-md-offset-1">
    <table class="table">
        <thead class="bg-tb">
            <tr class="">
                    <th class="col-md-4">Filme</th>
                    <th class="col-md-3">Categoria</th>
                    <th class="col-md-3">Status</th>
                    <th class="col-md-3">Ação</th>
            </tr>
        </thead>
    <tbody class="table-striped">
@foreach($filmes as $filme)
        <tr class="">
            <td class="col-md-4"><span>{{ $filme->str_titulo_filme }}</span></td>
            <td class="col-md-3"><span>{{ $filme->int_categoria_id }}</span></td>
            <td class="col-md-3"><span>Disponível</span></td>
            <td class="col-md-3">
                <div style="padding-top: 5px">
                <button class="btn btn-info" onclick="getDetalhe(this)" rel="{{ $filme->int_filme_id }}"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span></button>
                <a href="/admin/add/movie/{{ $filme->int_filme_id }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="/admin/delete/{{ $filme->int_filme_id }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
    </table>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalhe</h4>
      </div>
      <div class="modal-body">
        <div id="loading-detalhe" class="col-md-12 off"><img class="img-responsive" src="/img/spinner.gif" alt="carregando..." titulo="carregando..."></div>
        <div id="detalhe"></div>
      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

@endsection()