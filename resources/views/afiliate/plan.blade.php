
@extends('layouts.app')
@section('contenido')

<form action="{{route('store-plan-afiliate', ['dni' => $afiliado->dni])}}" method="POST" enctype="multipart/form-data">           
@csrf
@method('PATCH')

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un plan</label>
  <div class="col-sm-10">
      <select class="custom-select">
          <option disabled selected>Planes</option>
          @foreach($plans as $plan) 
            <option value="{{$plan->id}}">{{$plan->name}}</option>
          @endforeach
      </select>
  </div>
</div>

<button class="shadow bg-purple-900 hover:bg-purple-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " >Siguiente</button>
<a href="" type="button" class="btn btn-dark" onclick="return confirm('¿Desea cancelar la operacion?')">Cancelar</a>

</form>

@endsection