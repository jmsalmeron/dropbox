@extends('layouts.old-app')

@section('content')

    <main role="main">
        <section class="jumbotron bg-secure text-center mb-0 d-flex flex-row justify-content-center align-items-center">
            <div class="row pt-5 bg-secure">
                <div class="col-sm-12">
                        <h5 class="title-home">Seguridad</h5>
                        <div class="container"><img class="img-fluid" width="60%" src={{asset('img/features/secure/bg.jpg')}}></div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h5 class="title-home">Apartado de seguridad</h5>
                        </div>
                        <div style="margin-top: 100px;"></div>

                        <div class="col-sm-12 col-md-6 text-center my-auto">
                            <img class="img-fluid" src={{asset('img/features/secure/key.jpg')}}>
                        </div>
                        <div class="col-sm-12 col-md-6 text-center">
                            <h5 class="title-home">Privacidad y seguridad</h5>
                            <p class="pt-4 subtitle-home">Los usuarios solo tienen acceso a sus archivos</p>
                            <p>Posibilidad de ban si se incumplen las normas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-5 mb-5">
                <div class="col-sm-12 col-md-6 text-center my-auto">
                    <h5 class="title-home">Todo lo que necesitas lo tienes</h5>
                    <p class="pt-4 subtitle-home">Vivan los asperger</p>
                </div>
                <div class="col-sm-12 col-md-6 text-center my-auto">
                    <img src={{asset('img/admin.png')}} class="img-fluid">
                </div>
            </div>
        </div>
    </main>

@endsection