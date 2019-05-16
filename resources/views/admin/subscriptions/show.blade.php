@extends('admin.layouts.app')

@section('page', 'Detalles del plan')

@section('content')

    <div class="form-row">
        <div class="col-sm-6 mb-3">
            <label for="PlanName">Nombre del plan</label>
            <input type="text" name="plan_name" class="form-control is-valid" id="PlanName" value="{{ $plan->plan_name }}" disabled>
            <div class="invalid-feedback">El nombre del plan es obligatorio</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="PlanDescription">Descripcion del plan</label>
            <textarea class="form-control is-valid" name="plan_description" id="PlanDescription" rows="7" placeholder="{{ $plan->plan_description }}" disabled></textarea>
            <div class="invalid-feedback">Los detalles del plan son obligatorio</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="PlanPrice">Precio del plan</label>
            <input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" value="{{ $plan->plan_price }}" disabled>
            <div class="invalid-feedback">El precio del plan es obligatorio</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="PlanDuration">Duración del plan</label>
            <input type="text" name="plan_duration" class="form-control is-valid" id="PlanDuration" value="{{ $plan->plan_duration }}" disabled>
            <div class="invalid-feedback">La duración del plan es obligatoria</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="PlanType">Tipo de plan</label>
            <input type="text" name="plan_type" class="form-control is-valid" id="PlanType" value="{{ $plan->plan_type }}" disabled>
            <div class="invalid-feedback">El tipo del plan es obligatorio</div>
        </div>

        <hr>

        <div class="col-sm-6 mb-3">
            <label for="ModalName">Nombre en el modal</label>
            <input type="text" name="name" class="form-control is-valid" id="ModalName" value="{{ $plan->name }}" disabled>
            <div class="invalid-feedback">El nombre del modal es obligatorio</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="ModalDescription">Descripción en el modal</label>
            <input type="text" name="description" class="form-control is-valid" id="ModalDescription" value="{{ $plan->description }}" disabled>
            <div class="invalid-feedback">La descripción del modal es obligatorio</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="btnText">Texto del botón</label>
            <input type="text" name="btn_label" class="form-control is-valid" id="btnText" value="{{ $plan->btn_label }}" disabled>
            <div class="invalid-feedback">Debes agregar un texto al botón</div>
        </div>

        <div class="col-sm-6 mb-3">
            <label for="btnAmount">Total a cobrar</label>
            <input type="text" name="amount" class="form-control is-valid" id="btnAmount" value="{{ $plan->amount }}" disabled>
            <div class="invalid-feedback">Debes agregar un precio</div>
        </div>
    </div>

        <a class="btn btn-outline-success" href="{{ route('plans.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../../../css/admin.css">

    <script src="../../../js/app.js"></script>
@endsection

