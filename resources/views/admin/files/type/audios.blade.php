@extends('admin.layouts.app')

@section('page', 'Musica')

@section('content')

    <div class="container">
        <div class="row">
            @forelse($audios as $audio)
                <div class="col-md-4 col-sm-12 pb-4">
                    <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" controls></audio>
                    <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal" data-file-id="{{ $audio->id }}" type="submit">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
                @empty
                    <div class="container mb-4">
                        <div class="alert alert-warning" role="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                            <strong>Vaya</strong> Parece que aun no tienes musica
                        </div>
                    </div>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    @include('admin.partials.modals.files')

@endsection

@section('scripts')

    @include('admin.partials.js.deleteModal')

@endsection

