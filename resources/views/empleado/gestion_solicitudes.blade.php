@extends('layouts.app')
@section('contenido')

<div class="container">
    <div class="w-2/3 mx-auto  ">
      <div class=" bg-white shadow-md rounded my-6 w-auto ">
      
        <table class="text-center w-full border-collapse" id="myTable">
          <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
          <thead>
            <tr>
            <th scope="col">Afiliado</th>
            <th scope="col">Numero</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
            </tr>
          </thead>
            <div class="col-sm-4">
                <div class="search-box" align=left>
                    <i class="material-icons">&#xE8B6;</i>
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Buscar&hellip;">
                </div>
            </div>
          <tbody>

            @foreach ($solicitud as $soli)
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->afiliate($soli->afiliate)}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->id}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->tipo}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->descripcion}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->estado}}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{$soli->fecha}}</td>
              <td>
                <a href="{{route('solicitud.show', ['id' => $soli->id])}}" class="btn btn-default">
                <i class="material-icons">search</i>
                </a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>







</div>