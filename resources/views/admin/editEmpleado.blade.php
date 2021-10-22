
@extends('layouts.app')
@section('contenido')

<br>
<div class="col-sm-3 w-full "><h3><b>Formulario de Empleado</b></h3></div>
     
  <form action="{{ route('empleado-update', ['id' => $empleado->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" value= "{{old('name', $empleado->name)}}" required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_name" value= "{{old('last_name', $empleado->last_name)}}" required>

        </div>
        <div class="form-group">
                        <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                        <div class="col-sm-10 mb-4">
                         <select class="custom-select" name="dni_type" value="{{old('dni_type', $empleado->dni_type)}}">
                         <option disabled selected>{{old('dni_type', $empleado->dni_type)}}</option>
                         @if($empleado->dni_type === 'dni')
                            <option value="pasaporte" >pasaporte</option>
                            <option value="libreta" >libreta</option>
                         @elseif($empleado->dni_type === 'pasaporte')
                            <option value="dni" >dni</option>
                            <option value="libreta" >libreta</option>
                         @else
                            <option value="dni" >dni</option>
                            <option value="pasaporte" >pasaporte</option>
                         @endif
                        </select>
                </div>
        </div>
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="documento" id="empleado_dni" value= "{{old('documento', $empleado->documento)}}" required>

        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Rol</label>
        <div class="col-sm-10 mb-4">
          <select class="custom-select" name="role_id" value="{{old('role_id', $empleado->role->name)}}">
          <option disabled selected>{{old('role_id', $empleado->role->name)}}</option>
            @if($empleado->role->id === 1)
              <option value="empleado">empleado</option>
              <option value="afiliado">afiliado</option>
            @elseif($empleado->role->id === 2)
              <option value="admin" >admin</option>
              <option value="afiliado" >afiliado</option>
            @else
              <option value="admin" >admin</option>
              <option value="empleado" >empleado</option>
            @endif
          </select>

        </div>

          <!-- buttons -->
          <div class="form-group">
            <button class="btn btn-dark" >Siguiente</button>
            <a href="{{route('empleado-index')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a> 
          </div>
    </div>
  </form>
  @endsection