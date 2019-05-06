@extends('admin.layouts.app')

@section('page', 'Musica')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($audios as $audio)
                <div class="col-md-4 col-sm-12 pb-4">
                    <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" controls></audio>

                    <form action="{{ route('files.destroy', $audio->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection