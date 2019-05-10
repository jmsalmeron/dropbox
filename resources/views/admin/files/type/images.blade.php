@extends('admin.layouts.app')

@section('page', 'Imagenes')

@section('content')

    <div class="container">
        <div class="row">
            @forelse($images as $image)
                <div class="col-md-4 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{$image->name }}">
                        <div class="card-body">
                            <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary float-left"><i class="fas fa-eye"></i> Ver </a>
                            <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal" type="submit">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>

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
                                            <form action="{{ route('files.destroy', $image->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="PATCH">
                                                <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="container mb-4">
                        <div class="alert alert-warning" role="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                            <strong>Vaya</strong> Parece que aun no tienes imagenes
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

