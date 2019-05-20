@extends('admin.layouts.app')

@section('page', 'Agregar archivo')

@section('content')

    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" id="my-dropzone" class="dropzone">
        @csrf
        <div class="row d-flex flex-row justify-content-center align-items-center pt-5">
            <div class="dz-message">
                Sube tus archivos aqui&nbsp;
                {{--<label for="file">--}}
                    {{--Seleccione el archivo que quiere subir--}}
                {{--</label>--}}
                {{--<input type="file" class="form-control-file" name="file" required>--}}
            </div>
            <div class="dropzone-previews"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary" id="submit">Subir</button>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    {!! Html::script('js/dropzone.js'); !!}
    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 1000000,
            maxFiles: 20,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                // this.on("addedfile", function(file) {
                //     alert("file uploaded");
                // });

                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection
