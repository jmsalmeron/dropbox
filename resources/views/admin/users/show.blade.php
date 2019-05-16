@extends('admin.layouts.app')

@section('page', 'Detalles del usuario')

@section('content')

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="mt-5 pb-5">
                    <img src="{{ asset('img')}}/{{ $user->image }}" width="120" class="img-responsive rounded-circle d-block mx-auto">
                    <h4 class="text-center mt-3 mb-1">{{ $user->name }}</h4>
                    <p class="text-center">{{ $user->email }}</p>

                    <div class="d-flex row-flex justify-content-center">
                        <a class="btn btn-outline-success" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i> Editar Perfil</a>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-outline-success" href="{{ route('users.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../../../css/admin.css">

    <script src="../../../js/app.js"></script>
@endsection

