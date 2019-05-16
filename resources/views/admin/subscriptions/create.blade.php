@extends('admin.layouts.app')

@section('page', 'Crear una nueva subscripcion')

@section('content')

    <form action="{{ route('plans.store') }}" method="POST" class="was-validated">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="PlanName">Nombre del plan</label>
                <input type="text" name="plan_name" class="form-control is-valid" id="PlanName" placeholder="Mensual" required>
                <div class="invalid-feedback">El nombre del plan es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PlanDescription">Descripcion del plan</label>
                <textarea class="form-control is-valid" name="plan_description" id="PlanDescription" rows="5" placeholder="Todos los elementos incluidos en la descripcion" required></textarea>
                <div class="invalid-feedback">Los detalles del plan son obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PlanPrice">Precio del plan</label>
                <input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" placeholder="19" required>
                <div class="invalid-feedback">El precio del plan es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PlanDuration">Duración del plan</label>
                <input type="text" name="plan_duration" class="form-control is-valid" id="PlanDuration" placeholder="1 mes" required>
                <div class="invalid-feedback">La duración del plan es obligatoria</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="PlanType">Tipo de plan</label>
                <input type="text" name="plan_type" class="form-control is-valid" id="PlanType" placeholder="AspergerMensual" required>
                <div class="invalid-feedback">El tipo del plan es obligatorio</div>
            </div>

            <hr>

            <div class="col-sm-6 mb-3">
                <label for="ModalName">Nombre en el modal</label>
                <input type="text" name="name" class="form-control is-valid" id="ModalName" placeholder="AspergerBox" required>
                <div class="invalid-feedback">El nombre del modal es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="ModalDescription">Descripción en el modal</label>
                <input type="text" name="description" class="form-control is-valid" id="ModalDescription" placeholder="Plan mensual" required>
                <div class="invalid-feedback">La descripción del modal es obligatorio</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="btnText">Texto del botón</label>
                <input type="text" name="btn_label" class="form-control is-valid" id="btnText" placeholder="Adquirir" required>
                <div class="invalid-feedback">Debes agregar un texto al botón</div>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="btnAmount">Total a cobrar</label>
                <input type="text" name="amount" class="form-control is-valid" id="btnAmount" placeholder="1999" required>
                <div class="invalid-feedback">Debes agregar un precio</div>
            </div>
        </div>

        <button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
    </form>
    
@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection