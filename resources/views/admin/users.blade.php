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
                <label for="Filme">Nome:</label>
                <input type="text" name="filter_filme" class="form-control">
            </div>
            <div class="col col-md-4">
                <label for="Categoria">Acesso:</label>
                <select name="filter_categoria" id="" class="form-control">
                    <option value="">Selecione um nivel</option>
                    {{--@foreach($categorias as $categoria)--}}
                        {{--<option value="{{ $categoria->int_categoria_id }}">{{ $categoria->str_nome_categoria }}</option>--}}
                    {{--@endforeach--}}
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
            <a href="/admin/register" class="btn btn-success btn-block">Adicionar Usuario <span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </div>
</header>
<section>
    <div class="col col-md-9 col-md-offset-1">
    <table class="table">
        <thead class="bg-tb">
            <tr class="">
                    <th class="col-md-4">Nome</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-3">Acesso</th>
                    <th class="col-md-3">Ação</th>
            </tr>
        </thead>
    <tbody class="table-striped">
@foreach($users as $user)
        <tr class="">
            <td class="col-md-4"><span>{{ $user->name }}</span></td>
            <td class="col-md-3"><span>{{ $user->email }}</span></td>
            <td class="col-md-3"><span>Nivel</span></td>
            <td class="col-md-3">
                <div style="padding-top: 5px">
                <button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
                <a href="/admin/delete/{{ $user->id }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
    </table>
    </div>
</section>
@endsection()