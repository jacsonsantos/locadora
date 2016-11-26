<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Locadora - Administrativo</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/chosen/chosen.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <meta name="author" content="Jacson Santos">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
<div class="main">
    <div class="row">
        <div class="side-menu" id="side-menu">
            <div class="perfil">
                <img src="{{ '/uploads/'.Auth::user()->foto }}" alt="{{Auth::user()->name}}" class="">
            </div>
            <div class="name-user">
                <h1 class="text-center">{{ Auth::user()->name }}</h1>
                <hr class="hr">
            </div>
            <div class="menu">
                <div class="menu-item"><a href="/" title="Home" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-home"></span></a></div>
                @if(Auth::user()->int_acesso == '1' || Auth::user()->int_acesso == '3' || empty(Auth::user()->int_acesso))
                <div class="menu-item"><a href="/admin/my-film" title="Meus Filmes" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-facetime-video"></span></a></div>
                @endif
                @if(Auth::user()->int_acesso == '1' || Auth::user()->int_acesso == '2')
                <div class="menu-item filmes"><a href="#" title="Filme" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-film"></span></a></div>
                <div class="sub-filmes">
                    <div class="sub-item"><a href="/admin">Filmes</a></div>
                        <div class="sub-item"><a href="/admin/add/movie">Cadastro</a></div>
                </div>
                <div class="menu-item"><a href="{{ url('/admin/anexo') }}" title="Mídia" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-folder-open"></span></a></div>
                @endif
                @if(Auth::user()->int_acesso == '1')
                <div class="menu-item cliente"><a href="#" title="Usuario" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-user"></span></a></div>
                <div class="sub-cliente">
                    <div class="sub-item"><a href="/admin/users">Usuarios</a></div>
                    <div class="sub-item"><a href="/admin/register">Cadastro</a></div>
                </div>
                @endif
                <div class="menu-item"><a href="/admin/profile" title="Perfil" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-pencil"></span></a></div>
                <div class="menu-item"><a href="/logout" title="Sair" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-log-out"></span></a></div>
            </div>
        </div>
        <div class="side-content" id="side-content">
            @yield('content')
        </div>
    </div>
</div>
<script src="/jquery/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/chosen/chosen.jquery.js"></script>
<script src="/js/admin.js"></script>
</body>
</html>