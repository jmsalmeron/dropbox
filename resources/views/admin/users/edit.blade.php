@extends('admin.layouts.app')

@section('page', 'Editar usuario')

@section('content')

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="was-validated">
        @csrf
        @method('PATCH')
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="RoleName">Nombre del Usuario</label>
                <input type="text" name="name" class="form-control is-valid" id="UserName" value="{{ $user->name }}" required>
                <div class="invalid-feedback">El nombre es obligatorio</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="RoleName">Email del Usuario</label>
                <input type="text" name="email" class="form-control is-valid" id="UserEmail" value="{{ $user->email }}" required>
                <div class="invalid-feedback">El email es obligatorio</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label class="ml-3">Ten cuidado con los roles que otorgas</label>
                <div class="form-group">
                    <ul>
                        <div class="col-auto my-1">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                @foreach($roles as $role)
                                    <li>
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id }}"
                                        @if($user->roles->contains($role)) checked @endif

                                        >
                                        <label for="{{ $role->id }}" class="custom-control-label">{{ $role->name }}</label>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Editar</button>
    </form>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../../../css/admin.css">

    <script src="../../../js/app.js"></script>
@endsection