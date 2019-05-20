@extends('admin.layouts.app')

@section('page', 'Editar un rol')

@section('content')

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="was-validated">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="PermissionName">Nombre del permiso (Ej: Role.create)</label>
                <input type="text" name="name" class="form-control is-valid" id="PermissionName" value="{{ $permission->name }}" required>
                <div class="invalid-feedback">El nombre del permiso es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PermissionDescription">Descripcion del permiso (Ej: crear un rol)</label>
                <input type="text" name="description" class="form-control is-valid" id="PermissionDescription" value="{{ $permission->description }}" required>
                <div class="invalid-feedback">La descripcion del permiso es obligatorio</div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Editar</button>
    </form>

@endsection