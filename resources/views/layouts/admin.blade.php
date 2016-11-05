<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Locadora - Administrativo</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
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
                <img src="http://rs141.pbsrc.com/albums/r73/salem21_2006/homer-simpson.gif~c200" alt="" class="">
            </div>
            <div class="name-user">
                <h1 class="text-center">Homer</h1>
                <hr class="hr">
            </div>
            <div class="menu">
                <div class="menu-item filmes">Filme</div>
                <div class="sub-filmes">
                    <div class="sub-item"><a href="/admin">Filmes</a></div>
                    <div class="sub-item"><a href="/admin/add/movie">Cadastro</a></div>
                    <div class="sub-item">Alugado</div>
                    <div class="sub-item">Relatorio</div>
                </div>
                <div class="menu-item cliente">Usuario</div>
                <div class="sub-cliente">
                    <div class="sub-item"><a href="/admin/users">Usuarios</a></div>
                    <div class="sub-item"><a href="/admin/register">Cadastro</a></div>
                </div>
                <div class="menu-item">Perfil</div>
                <div class="menu-item"><a href="/logout">Sair</a></div>
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
<script src="/js/admin.js"></script>
</body>
</html>