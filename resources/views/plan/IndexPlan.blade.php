@extends('layouts.app')
@section('contenido')

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Planes</th>
      </tr>
      <br>
        <a href="{{route('planes-create')}}" class="btn btn-dark">Nuevo plan</a>
        <br>
    </thead>

    <tbody>
    @foreach($planes as $plan)
      <tr>
        <th scope="row">{{$plan->name}}</th>
        <td>
        
        @if(sizeof($plan->afiliados) != 0)
          <button href="" type="button" class="btn btn-dark" disabled>Deshabilitar plan</button>
        @else
          <a href="" class="btn btn-dark">Deshabilitar plan</a>
        @endif
          &nbsp;
          <a href="{{route('planes-edit', ['id' => $plan->id])}}" class="btn btn-dark">Editar plan</a>
          </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <a href="{{route('dashboard')}}" class="btn btn-dark">Volver</a>

@endsection