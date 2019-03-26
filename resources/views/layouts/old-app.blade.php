<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">

    <title>AspergerBox</title>
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src={{asset("img/logo.png")}} width="30" height="30" class="d-inline-block align-top" alt="">
            AspergerBox
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Características</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('secure')}}">Seguridad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Preguntas frecuentes</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-outline-primary">Login</a>
                </li>
                @endguest
                @if (auth()->user())
                <li class="nav-item">
                <a class="btn btn-outline-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
                @endif
            </ul>
        </div>
    </nav>


</header>

@yield('content')


<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <img src={{asset("img/logo.png")}} width="100">
            <small class="d-block mb-3 text-muted text-left">® AspergerBox</small>
        </div>

        <div class="col-sm-6 col-md-3">
            <h5>AspergerBox</h5>
            <p class="text-small text-muted">
                Los pagos y el almacenamiento dentro de nuestra plataforma son totalmente seguros. Los archivos estarán disponibles instantáneamente. Contamos con un servicio de almacenamiento 24/7
            </p>
        </div>

        <div class="col-sm-6 col-md-3 text-center">
            <h5>Más información</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Youtube</a></li>
                <li><a class="text-muted" href="#">GitHub</a></li>
                <li><a class="text-muted" href="#">Twitter</a></li>
                <li><a class="text-muted" href="#">Café y Código</a></li>
            </ul>
        </div>
        <div class="col-sm-6 col-md-3 text-right">
            <h5>Medios de pago</h5>
            <img class="img-fluid" src="http://3.bp.blogspot.com/-oumQWdMsBL8/Vh94mt2nYLI/AAAAAAAAANQ/qPwSgz1YgJc/s400/Payment%2BCard%2BNetworks%2BLogo.jpg" width="220">
        </div>
    </div>
</footer>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>



