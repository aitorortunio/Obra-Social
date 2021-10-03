
@extends('layouts.app')
@section('contenido')
    <!--<x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Crear Afiliado') }}
            </h2>
    </x-slot>-->
<!-- component -->
<br>
<div class="col-sm-3"><h2><b>Formulario de afiliado</b></h2></div>
     
  <form action="{{ route('store-afiliate') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name">

            <!-- @error('name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_last_name">

            <!-- @error('last_name')
              <small class="danger">{{$message}}</small>
            @enderror -->

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
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="dni" id="afiliate_dni">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="Date" class="col-sm-2 col-form-label mb-4">Fecha de Nacimiento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="birth_date" id="birth_date">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="provincia" class="col-sm-2 col-form-label mb-4">Provincia</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="province" id="provincia">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Ciudad</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="city" id="ciudad">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="street" id="calle">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Numero de calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="house_number" id="numeroCalle">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Email</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="email" name="email" id="email">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Telefono</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="+54 (cod area) numero" type="integer" name="tel" id="telefono">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
       
       

                
          <!-- buttons -->
          <div class="form-group">
            <button class="shadow bg-purple-900 hover:bg-purple-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " >Guardar</button>
          </div>
    </div>
  </form>
  @endsection