
@extends('layouts.app')
@section('contenido')
<div class="container-xl">
<form action="{{route('store-plan-afiliate', ['dni' => $afiliado->dni])}}" method="POST" enctype="multipart/form-data">           
@csrf
@method('PATCH')

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un plan</label>
  <div class="col-sm-10">
      <select class="custom-select" name="plan">
          <option disabled selected>Planes</option>
          @foreach($plans as $plan) 
            <option value="{{$plan->id}}">{{$plan->name}}</option>
          @endforeach
      </select>
  </div>
</div>

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un tipo de plan</label>
  <div class="col-sm-10">
      <select class="custom-select" name="tipo">
          <option disabled selected>Tipo de plan</option>
          @foreach($tipos as $tipo) 
            <option value="{{$tipo->id}}">{{$tipo->name}}</option>
          @endforeach
      </select>
  </div>
</div>

<button class="btn btn-dark" >Siguiente</button>
<a href="" type="button" class="btn btn-dark" onclick="return confirm('¿Desea cancelar la operacion?')">Cancelar</a>

</form>
</div>
@endsection