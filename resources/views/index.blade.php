<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Locadora - Bem Vindo</title>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/boot.css">
        <meta name="author" content="Jacson Santos">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
    </head>
    <body>
        <header class="bg-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 m-top-10">
                        <a href="/" style="font-size: 16pt;text-decoration: none;color: #d62728;">LocaFilms</a>
                    </div>
                    <form action="" class="form-search" onsubmit="return false" id="form-search" name="form-search">
                        <div class="col col-md-8">
                            <input type="search" name="s" class="form-control s m-top-10" placeholder="Pesquisar Filme ou Ator [Tecle Enter]">
                        </div>
                        <a href="/admin" class="btn m-top-10 text-white">Entrar <span class="glyphicon glyphicon-log-in"></span></a>
                    </form>
                </div>
            </div>
        </header>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/uploads/Banner_Locafilms.png" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="/uploads/Power_Rangers.png" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="/uploads/Banner_Liga_da_Justiça.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="jumbotron">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1">
            @foreach($lancamento as $lanca)
            <div class="col-xs-6 col-md-2 img-destaque">
                <a data-toggle="modal" data-target="#myModal" rel="{{$lanca->int_filme_id}}" onclick="getDetalhe(this)">
                    <img src="/uploads/{{ $lanca->thumbnail }}" alt="" class="img-circle">
                    {{--<span class="value-destaque">R$9,99</span>--}}
                </a>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
<section class="container-fluid">
    <div class="row">
        {{--<div class="col col-xs-12 col-md-2">--}}
            {{--<div class="row">--}}
                {{--<h2 style="margin-left:5px;"><strong>Categorias</strong></h2>--}}
                {{--<div id="loading" class="col-md-12 off"><img class="img-responsive" src="/img/spinner.gif" alt="carregando..." titulo="carregando..."></div>--}}
                {{--<div id="categorias"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col col-xs-12 col-md-9 col-md-offset-2">
            <div class="row">
                <div id="loading-search" class="col-md-12 off"><img class="img-responsive" src="/img/spinner.gif" alt="carregando..." titulo="carregando..."></div>
                <div id="search-content"></div>
            </div>
        </div>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <a href="#" type="button" class="btn btn-success">Alugar</a>
      </div>
    </div>
  </div>
</div>
    <script src="/jquery/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/boot.js"></script>
    </body>
</html>