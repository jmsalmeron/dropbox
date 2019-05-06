@extends('admin.layouts.app')

@section('page', 'Videos')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">subido</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <th scope="row">
                                @if($video->extension == 'mp4' || $video->extension == 'MP4' || $video->extension == 'vid' || $video->extension == 'VID')
                                    <img src="{{ asset('img/files/mp4.svg') }}" class="img-responsive" width="50">
                                @elseif($video->extension == 'avi' || $video->extension == 'AVI')
                                    <img src="{{ asset('img/files/avi.svg') }}" class="img-responsive" width="50">
                                @endif
                            </th>
                            <th scope="row">{{$video->name}}</th>
                            <th scope="row">{{$video->created_at->DiffForHumans()}}</th>
                            <th scope="row"><a class="btn btn-primary" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/video/{{ $video->name }}.{{ $video->extension }}"><i class="fas fa-eye"></i> Ver</a></th>
                            <th scope="row">
                                <form action="{{ route('files.destroy', $video->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
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
