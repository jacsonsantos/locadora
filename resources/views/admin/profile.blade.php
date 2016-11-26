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
        <h1 class="h1">Perfil</h1>
    </div>
</header>
<section class="m-top-15">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $user->id}}" name="id">
        <div class="row">
            <div class="col col-md-6 col-md-offset-2">
                <label for="Nome">Nome:</label>
                <input type="text" name="name" value="{{ $user->name }}" required class="form-control">
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-6 col-md-offset-2">
                <label for="Sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" value="{{ $user->sobrenome }}" required class="form-control">
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-6 col-md-offset-2">
                <label for="E-mail">E-mail:</label>
                <input type="text" name="email" value="{{ $user->email }}" required class="form-control">
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-5 col-md-offset-2">
                <label for="Capa">Foto do Perfil:</label>
                @if($user->foto)
                    <br>Abrir Foto do Perfil: <a style="color:#761c19;" target="_blank" href="{{ '/uploads/'.$user->foto }}" title="{{$user->name }}">{{$user->name }}</a>
                    <br>
                @endif
            <input type="file" accept= image/* name="foto">
            </div>
        </div>

    <div class="container m-top-15">
        <div class="row">
            <div class="col col-md-2 col-md-offset-2">
                <button class="btn btn-block btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-disk
"></span></button>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection()