
@extends('layouts.app')
@section('contenido')

<br>
<div class="col-sm-3 w-full "><h3><b>Formulario de Empleado</b></h3></div>
     
  <form action="{{ route('empleado-store') }}" method="POST" enctype="multipart/form-data">
    @csrf

      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" required>
        </div>

        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_name" required>

        </div>
        <div class="form-group">
                        <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10 mb-4">
                                <select class="custom-select" name="dni_type" value="{{old('tipo')}}">
                                    <option disabled selected>Tipo</option>
                                        <option value="tipo_dni" >DNI</option>
                                        <option value="tipo_pasaporte" >Pasaporte</option>
                                        <option value="tipo_libreta" >Libreta</option>
                                </select>
                            </div>
        </div>
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="documento" id="empleado_dni" required>

        </div>


      <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Contraseña</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="password" name="password" id="afiliate_name" required>

        </div>

          <!-- buttons -->
          <div class="form-group">
            <button class="btn btn-dark" >Siguiente</button>
            <a href="{{route('/')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a> 
          </div>
    </div>
  </form>
  @endsection