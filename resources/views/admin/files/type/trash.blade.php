@extends('admin.layouts.app')

@section('page', 'Papelera')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">borrado</th>
                        @if(Auth::user()->hasRole('ADMIN'))
                            <th scope="col">Usuario</th>
                        @endif
                        <th scope="col" class="justify-content-end">Restablecer</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($trashs as $trash)
                        <tr>
                            <th scope="row">
                                {{ $trash->id }}
                            </th>
                            <th scope="row">{{$trash->name}}</th>
                            <th scope="row">{{$trash->deleted_at}}</th>
                            @if(Auth::user()->hasRole('ADMIN'))
                                <th scope="row" class="float-right">{{$trash->user->name}}</th>
                            @endif
                            <th scope="row">
                                <form action="{{ route('files.restore', $trash->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-angle-left"></i> Restaurar</button>
                                </form>
                            </th>
                            <th scope="row">
                                <form action="{{ route('files.delete', $trash->id) }}" method="POST">
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
                                <strong>Vaya</strong> Parece que aun no tienes documentos
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

@endsection