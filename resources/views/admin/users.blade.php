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
                    <option value="">Selecione um Nivel de Acesso...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Normal</option>
                    <option value="3">Cliente</option>
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
            @if($user->int_acesso == '1')
                <td class="col-md-3"><span>Administrador</span></td>@endif
            @if($user->int_acesso == '2')
                    <td class="col-md-3"><span>Normal</span></td>@endif
            @if($user->int_acesso == '3')
                    <td class="col-md-3"><span>Cliente</span></td>@endif

            <td class="col-md-3">
                <div style="padding-top: 5px">
                <button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></button>
                <a href="/admin/delete/user/{{ $user->id }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
    </table>
    </div>
</section>
@endsection()