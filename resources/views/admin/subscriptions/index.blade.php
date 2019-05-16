@extends('admin.layouts.app')

@section('page', 'Todos los planes')

@section('content')

    <div class="container">
        <div class="row">
            <div class="sol-sm-12 mb-5">
                <a class="btn btn-outline-success" href="{{ route('plans.create') }}"><i class="fas fa-plus-circle"></i> Agregar nuevo plan</a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <th scope="row">{{ $plan->id }}</th>
                            <th scope="row">{{$plan->plan_name}}</th>
                            <th scope="row">${{$plan->plan_price}}</th>
                            <th scope="row">
                                <a class="btn btn-outline-primary" href="{{ route('plans.show', $plan->id) }}"><i class="far fa-edit"></i> Ver</a>
                            </th>
                            <th scope="row">
                                <a class="btn btn-outline-success" href="{{ route('plans.edit', $plan->id) }}"><i class="fas fa-eye"></i> Editar</a>
                            </th>
                            <th scope="row">
                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
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