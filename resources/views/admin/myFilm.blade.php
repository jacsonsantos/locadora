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
                <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container m-top-15">
        <div class="col col-md-2">
            <h1 style="font-size: 16pt;"><span class="glyphicon glyphicon-facetime-video"></span> Meus Filmes</h1>
        </div>
    </div>
</header>
<section>
    <div class="col col-md-9 col-md-offset-1">
        <table class="table">
            <thead class="bg-tb">
            <tr class="">
                <th class="col-md-6">Filme</th>
                <th class="col-md-1">Assistir</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($alugados as $alugado)
                <tr class="">
                    <td class="col-md-6"><span>{{ $alugado->str_titulo_filme }}</span></td>
                    <td class="col-md-1">
                        <div style="padding-top: 5px">
                            <button class="btn btn-success btn-block" onclick="getDetalhe(this)" rel="{{ $alugado->int_filme_id }}"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-facetime-video"></span></button>
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