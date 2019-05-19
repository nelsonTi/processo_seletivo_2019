<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Desafio - 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="robots" content="index, follow"/>


    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.png">


    <!-- CSS -->
    <link rel="stylesheet" href="/css/geral.css">

    <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="selectivizr.js"></script>
    <noscript>
        <link rel="stylesheet" href="[fallback css]"/>
    </noscript>
    <![endif]-->

</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<section class="conteudo-internas">
    <div class="centraliza">
        <div class="conteudo-esquerda">
            <div class="lista"><!--Lista de Noticias-->
                <form action="/" method="post" class="form-group row">
                    {!! csrf_field() !!}
                    <div class="col-12 busca">
                        <input type="text" class="form-control col-8" placeholder="Digite sua busca" name="parametro">
                        <button class="btn btn-primary col-2"> Buscar</button>
                    </div>
                </form>
                @if(isset($noticias) > 0)
                    <div class="alert alert-success" role="alert">
                        <span>{{count($noticias)}} resultados encontrados.</span>
                    </div>
                    @foreach($noticias as $noticia)
                        <article class="box-noticia"><!--Notícia-->
                            <a href="{{$noticia->url}}">
                                <figure>
                                    <img src="{{$noticia->imagem}}" alt="">
                                </figure>
                                <div class="texto-lista-noticias">
                                    <span class="data-lista-noticia">{{$noticia->data_formatada}}</span>
                                    <h1>{{$noticia->titulo}}</h1>
                                    <p>{{str_limit(strip_tags($noticia->texto),$value=300)}}</p>
                                </div>
                            </a>
                        </article><!--Fim Notícia-->
                        <hr>
                    @endforeach

                    <ul class="pagination">
                        @for ($i = 1; $i <= $total_pages ; $i++)
                            <li class="page-item @php echo $i== $page ? "active" : '' @endphp">
                                <a class="page-link" href="/{{$i}}">{{$i}}</a>
                            </li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a href="/" class=" page-link">Início</a>
                        </li>
                    </ul>
                    <!--Fim Paginação-->
                @else
                    <div class="alert alert-warning" role="alert">
                        <span>A busca por <b>{{$parametro}}</b> não encontrou nenhum resultado.
                            Confira se as palavras estão escritas corretamente.</span>
                    </div>
                    <br>
                    <a href="/" class="btn btn-outline-primary">Início</a>
                @endif

            </div><!--Fim Lista de Noticias-->

        </div> <!-- final conteudo-esquerda -->


    </div> <!-- final centraliza -->

</section>
</body>
</html>