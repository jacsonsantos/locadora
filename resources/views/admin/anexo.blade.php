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
        <h1 class="h1"><span class="glyphicon glyphicon-film"></span> Mídia</h1>
    </div>
</header>
<section class="m-top-15">
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col col-md-6 col-md-offset-1">
                <label for="Nome do Anexo">Nome da Mídia:</label>
                <input type="text" name="str_anexo" value="" required class="form-control">
            </div>
        </div>
        <div class="row m-top-15">
            <div class="col col-md-5 col-md-offset-1">
                <label for="Capa">Anexo:</label>
            <input type="file" name="anexo" accept="video/*">
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