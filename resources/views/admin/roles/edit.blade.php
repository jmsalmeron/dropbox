@extends('admin.layouts.app')

@section('page', 'Editar un rol')

@section('content')

    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="was-validated">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="RoleName">Nombre del Rol</label>
                <input type="text" name="name" class="form-control is-valid" id="RoleName" value="{{ $role->name }}" required disabled>
                <div class="invalid-feedback">El nombre del rol es obligatorio</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label class="ml-3">Ten cuidado con los permisos</label>
                <div class="form-group">
                    <ul>
                        <div class="col-auto my-1">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                @foreach($permissions as $permission)
                                    <li>
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $permission->id }}" value="{{ $permission->id }}"
                                        @if($role->permissions->contains($permission)) checked @endif

                                        >
                                        <label for="{{ $permission->id }}" class="custom-control-label">{{ $permission->description }}</label>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Editar</button>
    </form>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../../../css/admin.css">

    <script src="../../../js/app.js"></script>
@endsection