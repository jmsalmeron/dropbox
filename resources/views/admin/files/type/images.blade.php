@extends('admin.layouts.app')

@section('page', 'Imagenes')

@section('content')

    <div class="container">
        <div class="row">
            @forelse($images as $image)
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{$image->name }}">
                        <div class="card-body">
                            <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary float-left"><i class="fas fa-eye"></i> Ver </a>
                            <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal" data-file-id="{{ $image->id }}" type="submit">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
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

    <!-- Modal -->
@include('admin.partials.modals.files')
@endsection


@section('scripts')

    @include('admin.partials.js.deleteModal')

@endsection

