
@extends('layouts.app')
@section('contenido')

<br>
<div class="col-sm-3 w-full "><h2><b>Formulario de afiliado</b></h2></div>
     
  <form action="{{ route('store-afiliate') }}" method="POST" enctype="multipart/form-data">
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

        </div>
        <div class="form-group">
                        <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10 mb-4">
                                <select class="custom-select" name="dni_type">
                                    <option disabled selected>Tipo</option>
                                        <option value="dni" >DNI</option>
                                        <option value="pasaporte" >Pasaporte</option>
                                        <option value="libreta" >Libreta</option>
                                </select>
                            </div>
            @error('dni_type')
              <label class="col-form-label col-sm-10 red" style="color:red">Seleccione un tipo de documento</label>
            @enderror
        </div>
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="dni" id="afiliate_dni" required value="{{old('dni')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="Date" class="col-sm-2 col-form-label mb-4">Fecha de Nacimiento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="birth_date" id="birth_date" required value="{{old('birth_date')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="provincia" class="col-sm-2 col-form-label mb-4">Provincia</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="province" id="provincia"required value="{{old('province')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Ciudad</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="city" id="ciudad" required value="{{old('city')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="street" id="calle" required value="{{old('street')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Número de calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="house_number" id="numeroCalle" required value="{{old('house_number')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Email</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="email" name="email" id="email" required value="{{old('email')}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>

       
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Telefono</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="+54 (cod area) numero" type="integer" name="tel" id="telefono" pattern=".{8,}"
          oninvalid="setCustomValidity('Al menos 8 caracteres')"
          onchange="try{setCustomValidity('')}catch(e){}" required value="{{old('tel')}}">
          
            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->
            @error('tel')
              <label class="col-form-label col-sm-10 red" style="color:red">Tiene que ser de tipo numérico</label>
            @enderror
        </div>

        


                
          <!-- buttons -->
          <div class="form-group">
            <button class="btn btn-dark" >Siguiente paso</button>
            <a href="{{route('/')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a> 
          </div>
    </div>
  </form>
  @endsection