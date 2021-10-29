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

        <div class="form-group">
          <label for="Tipo" class="col-sm-2 col-form-label">Tipo</label>
              <div class="col-sm-10 mb-4">
                  <select class="custom-select" name="type">
                    @foreach($tipos as $t)
                      <option value="{{old('id', $t->id)}}" selected>{{$t->name}}</option>
                    @endforeach      
                  </select>
              </div>
        </div>

        <button class="btn btn-dark">Guardar plan</button>
</form>


@endsection