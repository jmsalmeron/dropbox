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
                    @forelse($videos as $role)
                        <tr>
                            <th scope="row">
                                @if($role->extension == 'mp4' || $role->extension == 'MP4' || $role->extension == 'vid' || $role->extension == 'VID')
                                    <img src="{{ asset('img/files/mp4.svg') }}" class="img-responsive" width="50">
                                @elseif($role->extension == 'avi' || $role->extension == 'AVI')
                                    <img src="{{ asset('img/files/avi.svg') }}" class="img-responsive" width="50">
                                @endif
                            </th>
                            <th scope="row">{{$role->name}}</th>
                            <th scope="row">{{$role->created_at->DiffForHumans()}}</th>
                            <th scope="row"><a class="btn btn-primary" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/role/{{ $role->name }}.{{ $role->extension }}"><i class="fas fa-eye"></i> Ver</a></th>
                            <th scope="row">
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
                                                <form action="{{ route('files.destroy', $role->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </tbody>

                    @empty
                        <div class="container mb-4">
                            <div class="alert alert-warning" role="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                                <strong>Vaya</strong> Parece que aun no tienes videos
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection

