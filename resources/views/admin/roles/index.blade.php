@extends('admin.layouts.app')

@section('page', 'Todos los roles')

@section('content')

    <div class="container">
        <div class="row">
            <div class="sol-sm-12 mb-5">
                <a class="btn btn-outline-success" href="{{ route('roles.create') }}"><i class="fas fa-plus-circle"></i> Agregar nuevo rol</a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <th scope="row">{{$role->name}}</th>
                            <th scope="row">
                                <a class="btn btn-outline-primary" href="{{ route('roles.show', $role->id) }}"><i class="far fa-edit"></i> Ver</a>
                            </th>
                            <th scope="row">
                                <a class="btn btn-outline-success" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-eye"></i> Editar</a>
                            </th>
                            <th scope="row">
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
                                <strong>Vaya</strong> Parece que aun no tienes roles
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

@endsection