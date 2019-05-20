@extends('admin.layouts.app')

@section('page', 'Todos los permisos')

@section('content')

    <div class="container">
        <div class="row">
            <div class="sol-sm-12 mb-5">
                <a class="btn btn-outline-success" href="{{ route('permissions.create') }}"><i class="fas fa-plus-circle"></i> Agregar nuevo permiso</a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <th scope="row">{{$permission->description}}</th>
                            <th scope="row">
                                <a class="btn btn-outline-success" href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-eye"></i> Editar</a>
                            </th>
                            <th scope="row">
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </th>
                        </tr>
                    </tbody>

                    @empty
                        <div class="container mb-4">
                            <div class="alert alert-warning" role="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                                <strong>Vaya</strong> Parece que aun no tienes permisos
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

@endsection