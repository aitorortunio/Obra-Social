
@extends('layouts.app')
@section('contenido')

<form action="{{ route('store-miembro', ['titularId' => $titular_id]) }}" method="POST" enctype="multipart/form-data">

    @csrf
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" required value="{{old('name')}}">
          
            <!-- @error('name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_last_name" required value="{{old('last_name')}}">

            <!-- @error('last_name')
              <small class="danger">{{$message}}</small>
            @enderror -->

          <!-- buttons -->
          <div class="col text-center">
            <button class="btn btn-dark" >Aceptar</button>
            <a href="{{route('/')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a> 
          </div>
    </div>
  </form>
  @endsection