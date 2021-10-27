
@extends('layouts.app')
@section('contenido')

  <form action="{{route('afiliate-update', ['id' => $afiliado->dni])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    
    @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" value="{{old('name', $afiliado->name)}}" readonly>

            <!-- @error('name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_last_name" value="{{old('last_name', $afiliado->last_name)}}" readonly>

            <!-- @error('last_name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
            <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                <div class="col-sm-10 mb-4">
                    <select class="custom-select" name="dni_type" value="{{old('dni_type', $afiliado->dni_type)}}">
                        <option disabled selected>{{old('dni_type', $afiliado->dni_type)}}</option>
                    </select>
                </div>
        </div>
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="dni" id="afiliate_dni" value="{{old('dni', $afiliado->dni)}}"  readonly>

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="Date" class="col-sm-2 col-form-label mb-4">Fecha de Nacimiento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="birth_date" id="birth_date" value="{{old('birth_date', $afiliado->birth_date)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="provincia" class="col-sm-2 col-form-label mb-4">Provincia</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="province" id="provincia" value="{{old('province', $afiliado->province)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Ciudad</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="city" id="ciudad" value="{{old('city', $afiliado->city)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="street" id="calle" value="{{old('street', $afiliado->street)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Numero de calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="house_number" id="numeroCalle" value="{{old('house_number', $afiliado->house_number)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Email</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="email" name="email" id="email" value="{{old('email', $afiliado->email)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Telefono</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="+54 (cod area) numero" type="integer" name="tel" id="telefono" value="{{old('tel', $afiliado->tel)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
       
        

        <div class="col text-center">
            <button class="btn btn-dark" style="float:center">Guardar</button>
            <a href="{{route('dashboard')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark" style="float:center">Cancelar</a> 
          </div>          
    </div>
  </form>

   <!-- buttons -->
   <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    
   
   <div class="form-group">
      <label class="col-sm-2 col-form-label mb-4">Plan</label>
      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text"  id="telefono" value="{{old('name', $plan->name)}}">
    </div>


   <div class="form-group">
    <label class="col-sm-2 col-form-label mb-4">Tipo plan</label>
    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text"  id="telefono" value="{{old('name', $tipo->name)}}">
  </div>
  <div class="col text-center">
    @if($afiliado->titular_id === null)
      @if($tipo->name === 'Familia 2 hijos')
        @if($cantMiembros < '3')
              <a href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar miembro</a>
        @else
              <button href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar miembro</button>
        @endif
        
      @elseif($tipo->name === 'Familia 3 hijos')
        @if($cantMiembros < 4)
          <a href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar miembro</a>
        @else
          <button href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar miembro</button>
        @endif
            
        @elseif($tipo->name === 'Pareja Joven')
          @if($cantMiembros < 1)
            <a href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar pareja</a>
          @else
          <button href="{{route('add-familiar', ['id' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar pareja</button>
          @endif
      @endif
    @endif

  </div>
</div>
  @endsection