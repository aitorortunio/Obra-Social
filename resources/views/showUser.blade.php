@extends('layouts.app')
@section('contenido')



<div class="container-xl">

  <table class="table" id="myTable">
    <thead>
    
      <br>
    
      <div class="form-group">
      <label class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off"  type="text" name="name" id="empleado_dni" value= "{{old('name', $user->name)}}" readonly   required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off"  type="text" name="last_name" id="last_name" value= "{{old('last_name', $user->last_name)}}" readonly required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4 dark">Tipo documento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="dni_type" id="dni_type" value= "{{old('dni_type', $user->dni_type)}}" readonly  required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Documento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="integer" name="documento" id="documento" value= "{{old('documento', $user->documento)}}" readonly  required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Email</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off"  type="text" name="email" id="email" value= "{{old('email', $user->email)}}" readonly  required>
        </div>

      <br>
    </thead>

  </table>
  <div class="col text-center">
    <a href="{{route('dashboard')}}" class="btn btn-dark" style="float:center">Volver</a>
</div>

</div>
@endsection