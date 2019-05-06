@extends('admin.layouts.app')

@section('page', 'Imagenes')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{$image->name }}">
                        <div class="card-body">
                            <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary float-left"><i class="fas fa-eye"></i> Ver </a>
                            <form action="{{ route('files.destroy', $image->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection