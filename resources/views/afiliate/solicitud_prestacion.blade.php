@extends('layouts.app')
@section('contenido')


<div class="col-sm-3 w-full "><h2><b>Solicitud de reintegro</b></h2></div>
     
<form action="{{ route('store-prestacion') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class=" mb-4">Institucion o direccion donde se realiza</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="institucion" id="institucion">
        </div>
        <div class="form-group">
        <label for="Date" class="col-sm-2 col-form-label mb-4">Fecha</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="fecha" id="fecha">
        
        <div class="form-group">
        <label for="provincia" class=" mb-4">Descripcion (opcional)</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="descripcion" id="descripcion">

        </div>
        <div>
          <label class="title  border-gray-300 p-2 mb-4 outline-none">
            Seleccionar orden medica
          </label>
          <div class="form-group">
              <div class="space-y-1 text-center">
                <div class="flex text-sm text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <input id="file-upload"  type="file" class="form-control-file"  name="orden_medica" alt="file-name" id="orden_medica">
                  </label>
                </div>
              </div>
          </div>
        </div>
        <div class="form-group">
          <x-input id="name" class="block mt-1 w-full" type="hidden" name="afiliate" value="{{Auth::user()->documento}}"  />
        </div>
    <!-- buttons -->
    <div class="form-group">
            <button class="btn btn-dark" >Aceptar</button>
            <a href="{{route('dashboard')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a> 
    </div>
    </div>
  </form>
  @endsection