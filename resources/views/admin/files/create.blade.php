@extends('admin.layouts.app')

@section('page', 'Agregar archivo')

@section('content')

    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row d-flex flex-row justify-content-center align-items-center pt-5">
            <div class="form-group">
                <label for="file">
                    Seleccione el archivo que quiere subir
                </label>
                <input type="file" class="form-control-file" name="file" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary file">Subir</button>
            </div>
        </div>
    </form>

@endsection

@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection
