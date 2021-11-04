@extends('layouts.app')
@section('contenido')

<div class="container-xl">
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Accion</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo de Documento</th>
        <th>Documento</th>
        <th>Fecha de Nacimiento</th>
        <th>Provincia</th>
        <th>Ciudad</th>
        <th>Calle</th>
        <th>Numero</th>
        <th>Email</th>
        <th>Telefono</th>
      </tr>
      <br>

        <a style="float:right" href="{{route('add-afiliate')}}" class="btn btn-dark">Agregar Afiliado</a>
      <br>
    </thead>
    @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
   

    <div class="col-sm-4">
        <div class="search-box" align=left>
        <i class="material-icons">&#xE8B6;</i>
            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de Afiliado&hellip;">
        </div>
    </div>


    <tbody>
    @foreach($afiliados as $afiliado)
      <tr>
        <td scope="row"><a href="{{route('afiliate-showAfiliado', ['dni' => $afiliado->dni])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a></td>
        <td scope="row">{{$afiliado->name}}</td>
        <td scope="row">{{$afiliado->last_name}}</td>
        <td scope="row">{{$afiliado->dni_type}}</td>
        <td scope="row">{{$afiliado->dni}}</td>
        <td scope="row">{{$afiliado->birth_date}}</td>
        <td scope="row">{{$afiliado->province}}</td>
        <td scope="row">{{$afiliado->city}}</td>
        <td scope="row">{{$afiliado->street}}</td>
        <td scope="row">{{$afiliado->house_number}}</td>
        <td scope="row">{{$afiliado->email}}</td>
        <td scope="row">{{$afiliado->tel}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="col text-center">
    <a href="{{route('dashboard')}}" class="btn btn-dark" style="float:center">Volver</a>
</div>

</div>
@endsection