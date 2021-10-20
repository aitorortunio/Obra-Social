
@extends('layouts.app')
@section('contenido')

  <table class="table">
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
            <a href="" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
            <a href="" onclick="return confirm('¿Desea borrar el empleado: {{$empleado->name}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <a href="{{route('dashboard')}}" class="btn btn-dark">Volver</a>

@endsection