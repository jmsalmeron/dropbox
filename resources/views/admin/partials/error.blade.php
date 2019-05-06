@if($errors->any())
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>

            @foreach($errors->all() as $error)
                @if($error == 'validation.mimes')
                    <strong>Error</strong> El tipo de archivo no esta permitido
                @endif
                @if($error == 'validation.max.file')
                    <strong>Error</strong> El tamaño maximo del archivo son 3 megas
                @endif

            @endforeach

        </div>
    </div>
@endif