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
            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de plan&hellip;" autocomplete="off">
        </div>
    </div>

    <tbody>
        @foreach($planes as $plan)
        <tr>
          <td scope="row">
            {{$plan->name}}
          </td>
          
          @if($plan->id > 3) <!--Los 3 planes (A-B-C) son intocables -->
            @if($plan->stateValue($plan->id) === 1)
              @if($plan->cantAfiliados($plan->id) === 0 )
              <td><a href="{{route('planes-changeValue', ['id' => $plan->id])}}" type="button" class="btn btn-dark" >Deshabilitar plan</a><a href="{{route('planes-edit', ['id' => $plan->id])}}" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a><a href="{{route('planes-delete', ['id' => $plan->id])}}" onclick="return confirm('¿Desea borrar el plan: {{$plan->name}}?')" class="delete"><i class="material-icons">&#xE872;</i></a></td>
                @else
                <td><button href="{{route('planes-changeValue', ['id' => $plan->id])}}" type="button" class="btn btn-dark" disabled>Deshabilitar plan</button><a href="{{route('planes-edit', ['id' => $plan->id])}}" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a><a href="{{route('planes-delete', ['id' => $plan->id])}}" onclick="return confirm('¿Desea borrar el plan: {{$plan->name}}?')" class="delete"><i class="material-icons">&#xE872;</i></a></td>
              @endif
              @else
              <td><a href="{{route('planes-changeValue', ['id' => $plan->id])}}" type="button" class="btn btn-dark" >Habilitar plan</a><a href="{{route('planes-edit', ['id' => $plan->id])}}" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a><a href="{{route('planes-delete', ['id' => $plan->id])}}" onclick="return confirm('¿Desea borrar el plan: {{$plan->name}}?')" class="delete"><i class="material-icons">&#xE872;</i></a></td>
            @endif
            <td></td><!-- No tocar -->
           
      </tr>
        @endif
        @endforeach
    </tbody>
  </table>

  <a href="{{route('dashboard')}}" class="btn btn-dark">Volver</a>

@endsection