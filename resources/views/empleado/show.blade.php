@extends('layouts.app')
@section('contenido')


<div class="col-sm-3 w-full "><h2><b>Solicitud de reintegro</b></h2></div>
     
<form action="{{ route('aprobar', ['id'=>$solicitud->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
      <div class="form-group">
        <label  class=" mb-4">Afiliado</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="afiliate" id="afiliate" value="{{old('afiliate', $solicitud->afiliate)}}" readonly>
        </div>
        <div class="form-group">
        <label  class=" mb-4">Institucion o direccion donde se realiza</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="institucion" id="institucion" value="{{old('institucion', $solicitud->institucion)}}" readonly>
        </div>
        <div class="form-group">
        <label for="Date" class=" mb-4">Fecha</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="fecha" id="fecha" value="{{old('fecha', $solicitud->fecha)}}" readonly>
        
        <div class="form-group">
        <label for="provincia" class=" mb-4">Descripcion (opcional)</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="descripcion" id="descripcion"  value="{{old('descripcion', $solicitud->descripcion)}}" readonly>

        </div>
        
    <!-- buttons -->
    <div class="form-group">
            <button class="btn btn-dark"onclick="return confirm('¿Desea aprobar la solicitud?')" >Aprobar</button>
           
    </div>
    
    </div>
  </form>
  <form action="{{route('desaprobar', ['id'=>$solicitud->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
        <button class="btn btn-dark" onclick="return confirm('¿Desea desaprobar la solicitud?')" class="btn btn-dark">Desaprobar</button>
    </form>
  @endsection