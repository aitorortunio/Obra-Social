@extends('layouts.app')
@section('contenido')

<div class="container">
    <div class="2-row w-70 mt-4">
        <a href="{{route('reintegro', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4 mr-5">Nueva solicitud de reintegro</a>
        <a href="{{route('prestacion', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Nueva solicitud de prestacion</a>
    </div>
    <div class="w-2/3 mx-auto  ">
      <div class=" bg-white shadow-md rounded my-6 w-auto ">
      
        <table class="text-center w-full border-collapse">
          <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
          <thead>
            <tr>
            <th scope="col">Numero</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($solicitud as $soli)
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->id}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->tipo}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->descripcion}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->estado}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->fecha}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>







</div>
@endsection