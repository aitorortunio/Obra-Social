@extends('layouts.app')
@section('contenido')

<div class="col-sm-3 w-full "><h3><b>Formulario de plan</b></h3></div>
<form action="{{route('plan-store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre de plan</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" required>
        </div>
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="form-group">
                        <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10 mb-4">
                                <select class="custom-select" name="type">
                                  @foreach($tipos as $t)
                                    <option value="{{$t->id}}"disabled selected>$t->name</option>
                                        
                                </select>
                            </div>
        </div>
        <div>
          <button class="btn btn-dark">Guardar plan</button>
          <a href="{{route('plan')}}" class="btn btn-dark">Volver</a>
        </div>
</form>

@endsection