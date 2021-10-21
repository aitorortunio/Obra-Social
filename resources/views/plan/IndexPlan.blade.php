@extends('layouts.app')
@section('contenido')

  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Planes</th>
      </tr>
      <br>
      @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    
      <a href="{{route('planes-create')}}" class="btn btn-dark">Nuevo plan</a>
      <br>
    </thead>
    

    <div class="col-sm-4">
        <div class="search-box" align=left>
        <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de plan&hellip;">
        </div>
    </div>

    <tbody>
    
    
      @foreach($planes as $plan)
      <tr>
      <td scope="row">{{$plan->name}}</td>
          
            @if(sizeof($plan->afiliados) != 0)
              <td><button href="" type="button" class="btn btn-dark" disabled>Deshabilitar plan</button> <a href="{{route('planes-edit', ['id' => $plan->id])}}" class="btn btn-dark">Editar plan</a></td>
            @else
              <td><a href="" class="btn btn-dark">Deshabilitar plan</a> <a href="{{route('planes-edit', ['id' => $plan->id])}}" class="btn btn-dark">Editar plan</a></td>
            @endif
              &nbsp;
              <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{route('dashboard')}}" class="btn btn-dark">Volver</a>

@endsection