@extends('admin.layouts.app')

@section('page', 'Todos los usuarios')

@section('content')

    <div class="container">
        <div class="row">
            <div class="sol-sm-12 mb-5">
                <a class="btn btn-outline-success" href="{{ route('users.create') }}"><i class="fas fa-plus-circle"></i> Agregar nuevo usuario</a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row"><img src="{{ asset('img')}}/{{ $user->image }}" width="35"></th>
                            <th scope="row">{{$user->name}}</th>
                            <th scope="row">{{$user->email}}</th>
                            <th scope="row">
                                <a class="btn btn-outline-primary" href="{{ route('users.show', $user->id) }}"><i class="far fa-edit"></i> Ver</a>
                            </th>
                            <th scope="row">
                                <a class="btn btn-outline-success" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-eye"></i> Editar</a>
                            </th>
                            <th scope="row">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection