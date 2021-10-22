
@extends('layouts.app')
@section('contenido')

<div class="container-xl">
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Empleado</th>
        <th>Documento</th>
        <th>Rol</th>
        <th>Acciones</th>
      </tr>
      <br>

        <a style="float:right" href="{{route('empleado-create')}}" class="btn btn-dark">Agregar Empleado</a>
      <br>
    </thead>

    @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="col-sm-4">
        <div class="search-box" align=left>
        <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de empleado&hellip;">
        </div>
    </div>


    <tbody>
    @foreach($empleados as $empleado)
      <tr>
        <td scope="row">{{$empleado->name}}</td>
        <td scope="row">{{$empleado->documento}}</td>
        <td scope="row">
           @if(($empleado->role_id)==1)
                Admin
            @elseif(($empleado->role_id)==2)
                Empleado
                @else
                  Afiliado
            @endif
           </td>
        <td>
            <a href="{{route('empleado-edit', ['id' => $empleado->id])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
            <a href="{{route('empleado-delete', ['id' => $empleado->id])}}" onclick="return confirm('¿Desea borrar el empleado: {{$empleado->name}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="col text-center">
    <a href="{{route('dashboard')}}" class="btn btn-dark" style="float:center">Volver</a>
</div>

</div>
@endsection