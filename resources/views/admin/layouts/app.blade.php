<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="css/admin.css" rel="stylesheet">
    <script src="js/app.js"></script>

    <title>Dashboard</title>
</head>

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <a class="navbar-brand ml-4" href="#">
            <img src={{ asset('img/logo.png') }} width="30" height="30" class="d-inline-block align-top" alt="">
            AspergerBox
        </a>

        <div class="container mt-4 mb-2">
            <div class="mb-2">
                <img src="img/users/user.jpg" class="img-responsive" style="border-radius: 50%;" alt="" width="70">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Brayan Angarita</div>
                <div class="profile-usertitle-status">admin@admin.com</div>
            </div>
        </div>


        <ul class="list-unstyled components">
            <li class="active">
                <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
            </li>

            <li>
                <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-circle"></i> Mi perfil</a>
                <ul class="collapse list-unstyled" id="profileSubmenu">
                    <li>
                        <a href="#">Ver mi perfil</a>
                    </li>
                    <li>
                        <a href="#">Actualizar perfil</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Mis archivos</a>
                <ul class="collapse list-unstyled" id="filesSubmenu">
                    <li>
                        <a href="{{ route('files.create') }}">Subir archivos</a>
                    </li>
                    <li>
                        <a href="#">Imágenes</a>
                    </li>
                    <li>
                        <a href="#">Videos</a>
                    </li>
                    <li>
                        <a href="#">Documentos</a>
                    </li>
                    <li>
                        <a href="#">ZIP</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
                <ul class="collapse list-unstyled" id="rolesSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar rol</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
                <ul class="collapse list-unstyled" id="permissionSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar permiso</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar rol</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a class="logout" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a>@yield('page')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

@yield('content')

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

@yield('scripts')



</body>


</html>



