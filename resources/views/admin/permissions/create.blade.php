@extends('admin.layouts.app')

@section('page', 'Crear un nuevo permiso')

@section('content')

    <form action="{{ route('permissions.store') }}" method="POST" class="was-validated">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="PermissionName">Nombre del permiso (Ej: Role.create)</label>
                <input type="text" name="name" class="form-control is-valid" id="PermissionName" placeholder="Nombre del permiso" required>
                <div class="invalid-feedback">El nombre del permiso es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PermissionDescription">Descripcion del permiso (Ej: crear un rol)</label>
                <input type="text" name="description" class="form-control is-valid" id="PermissionDescription" placeholder="Descripcion del permiso" required>
                <div class="invalid-feedback">La descripcion del permiso es obligatorio</div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
    </form>
    
@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection