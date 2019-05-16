@extends('admin.layouts.app')

@section('page', 'Crear un nuevo usuario')

@section('content')

    <form action="{{ route('users.store') }}" method="POST" class="was-validated">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="UserName">Nombre</label>
                <input type="text" name="name" class="form-control is-valid" id="UserName" placeholder="Nombre del usuario" required>
                <div class="invalid-feedback">El nombre es obligatorio</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="UserEmail">Email</label>
                <input type="email" name="email" class="form-control is-valid" id="UserEmail" placeholder="Email del usuario" required>
                <div class="invalid-feedback">El email es obligatorio</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="UserPassword">Contraseña</label>
                <input type="password" name="password" class="form-control is-valid" id="UserPassword" required>
                <div class="invalid-feedback">La contraseña es obligatoria</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="UserImage">Imagen del Usuario por defecto</label>
                <input type="image" name="image" class="form-control" id="UserImage" value="perfil.svg" disabled>
            </div>
            <div class="col-sm-6 mb-3">
                <label class="ml-3">Ten cuidado con los permisos</label>
                <div class="form-group">
                    <ul>
                        <div class="col-auto my-1">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                @foreach($roles as $role)
                                    <li>
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id }}">
                                        <label for="{{ $role->id }}" class="custom-control-label">{{ $role->name }}</label>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
    </form>
    
@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection