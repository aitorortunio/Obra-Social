@extends('layouts.app')
@section('contenido')


<div class="col-sm-3 w-full "><h3><b>Cambiar nombre de plan</b></h3></div>
<form action="{{route('planes-update', ['id' => $plan->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre de plan</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" value="{{old('name', $plan->name)}}" type="text" name="name" id="afiliate_name">
        </div>
        @error('name')
            <label class="col-form-label col-sm-10">{{$message}}</label>
        @enderror

        
        <label for="Tipo" class="col-sm-2 col-form-label">Tipos de planes</label>
        <br>
        <div class="form-group">
                    
                      <label>Individual Joven</label>
                      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="individualJoven" value="{{$individualJoven->price}}" id="afiliate_name" required>
                   

                      <label>Individual Senior</label>
                      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="individualSenior" value="{{$individualSenior->price}}" id="afiliate_name" required>
                    
                      <label>Pareja Joven</label>
                      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="parejaJoven" value="{{$parejaJoven->price}}" id="afiliate_name" required>
                    
                      <label>Familia 2 hijos</label>
                      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="familia2Hijos" value="{{$familia2Hijos->price}}" required>
                   
                      <label>Familia 3 hijos</label>
                      <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" type="text" name="familia3Hijos" value="{{$familia3Hijos->price}}" required>
                        
                  </select>
              </div>
              <div class="col text-center">
                <button class="btn btn-dark">Guardar plan</button>
                <a href="{{route('plan')}}" class="btn btn-dark">Volver</a>
              </div>
        </div>

        
</form>


@endsection