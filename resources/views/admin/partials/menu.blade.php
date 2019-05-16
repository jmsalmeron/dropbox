@if(Auth()->user()->hasRole('ADMIN'))
    <li class="active">
        <a href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> Panel</a>
    </li>
@endif
@if(Auth()->user()->hasRole('ADMIN|SUBS'))
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
                <a href="{{ route('files.images') }}">Imágenes</a>
            </li>
            <li>
                <a href="{{ route('files.videos') }}">Videos</a>
            </li>
            <li>
                <a href="{{ route('files.audios') }}">Musica</a>
            </li>
            <li>
                <a href="{{ route('files.documents') }}">Documentos</a>
            </li>
        </ul>
    </li>
@endif

@if(Auth()->user()->hasRole('ADMIN'))

<li>
    <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
    <ul class="collapse list-unstyled" id="rolesSubmenu">
        <li>
            <a href="{{ route('roles.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('roles.create') }}">Agregar rol</a>
        </li>
    </ul>
</li>

<li>
    <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
    <ul class="collapse list-unstyled" id="permissionSubmenu">
        <li>
            <a href="{{ route('permissions.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('permissions.create') }}">Agregar permiso</a>
        </li>
    </ul>
</li>

<li>
    <a href="#PlansSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Planes</a>
    <ul class="collapse list-unstyled" id="PlansSubmenu">
        <li>
            <a href="{{ route('plans.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('plans.create') }}">Agregar plan</a>
        </li>
    </ul>
</li>

<li>
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="{{ route('users.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('users.create') }}">Agregar usuario</a>
        </li>
    </ul>
</li>
@endif
<li>
    <a href="mailto:prueba@prueba.com"><i class="far fa-question-circle"></i> Soporte</a>
</li>

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
