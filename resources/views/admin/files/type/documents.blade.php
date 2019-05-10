@extends('admin.layouts.app')

@section('page', 'Documentos')

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
                    @forelse($documents as $document)
                        <tr>
                            <th scope="row">
                                @if($document->extension == 'doc' || $document->extension == 'DOC' || $document->extension == 'docx' || $document->extension == 'DOX' || $document->extension == 'odt' || $document->extension == 'ODT')
                                    <img src="{{ asset('img/files/word.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <img src="{{ asset('img/files/pdf.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'xlsx' || $document->extension == 'XLSX')
                                    <img src="{{ asset('img/files/excel.svg') }}" class="img-responsive" width="50">
                                @endif
                            </th>
                            <th scope="row">{{$document->name}}</th>
                            <th scope="row">{{$document->created_at->DiffForHumans()}}</th>
                            <th scope="row">
                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <a class="btn btn-primary float-right" style="width: 55%" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a>
                                @else
                                    <a class="btn btn-success float-right" style="width: 55%" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a>
                                @endif
                            </th>
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
                                                <form action="{{ route('files.destroy', $document->id) }}" method="POST">
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
                                <strong>Vaya</strong> Parece que aun no tienes documentos
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

