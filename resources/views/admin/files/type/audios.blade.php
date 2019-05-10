@extends('admin.layouts.app')

@section('page', 'Musica')

@section('content')

    <div class="container">
        <div class="row">
            @forelse($audios as $audio)
                <div class="col-md-4 col-sm-12 pb-4">
                    <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" controls></audio>
                    <button class="btn btn-danger float-right mt-1" data-toggle="modal" data-target="#deleteModal" type="submit">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este archivo?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Los archivos que elimine no se podrán recuperar</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                <form action="{{ route('files.destroy', $audio->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
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

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection

