
@extends('layouts.app')
@section('contenido')

<form action="{{route('afiliate-update', ['id' => $afiliado->id])}}" method="POST" enctype="multipart/form-data">
                
@csrf
@method('PATCH')

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un plan</label>
  <div class="col-sm-10">
      <select class="custom-select">
          <option disabled selected>Planes</option>
          @foreach($plans as $plan) 
            <option value="{{$plan->name}}">{{$plan->name}}</option>
          @endforeach
      </select>
  </div>
</div>

<a href="{{route('dashboard')}}" type="button" class="btn btn-dark">Siguiente</a>
<a href="" type="button" class="btn btn-dark" onclick="return confirm('¿Desea cancelar la operacion?')">Cancelar</a>

</form>

@endsection