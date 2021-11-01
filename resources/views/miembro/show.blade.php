
@extends('layouts.app')
@section('contenido')
<div class="col-sm-3 w-full "><h3><b>Datos de miembro</b></h3></div>

      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="miembro_name" required value="{{old('name', $miembro->name)}}" readonly>
          
            <!-- @error('name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="miembro_last_name" required value="{{old('last_name', $miembro->last_name)}}" readonly>

            <!-- @error('last_name')
              <small class="danger">{{$message}}</small>
            @enderror -->

          <!-- buttons -->
          <div class="col text-center">
            <a href="{{route('afiliate-show', ['dni' => $miembro->titular_id])}}"  class="btn btn-dark">Volver</a> 
          </div>
        </div>
  @endsection