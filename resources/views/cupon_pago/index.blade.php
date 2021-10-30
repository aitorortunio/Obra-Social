@extends('layouts.app')
@section('contenido')
<?php
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
?>
<div class="container">
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#pagoMensualModal">
    Cupon Pago Mensual
    </button>

    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#pagoSemestralModal">
        Cupon de Pago Semestral
    </button>

    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#pagoAnualModal">
    Cupon de Pago Anual
    </button>

</div>
<!-- Pago semestral -->
<div class="modal fade" id="pagoSemestralModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Obtener cupon de pago semestral</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a href="{{route('primer_bimestre', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Generar pdf primer brimestre</a>
      <a href="{{route('primer_bimestre', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Generar pdf segundo brimestre</a>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- Pago Mensual -->
<form action="{{ route('mensual', ['dni'=> Auth::user()->name]) }}" method="GET" enctype="multipart/form-data">
    @csrf
  <!-- Pago Semestral -->
  <div class="modal fade" id="pagoMensualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Obtener cupon de pago mensual</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
                                  <label><strong>Meses :</strong></label><br>
                                  @foreach($meses as $mes)
                                  <label><input type="checkbox" name="meses[]" value="{{$mes}}"> {{$mes}}</label>
                                  @endforeach
                              </div>  
        
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark mb-4">Generar pdf</button>
        </div>
      </div>
    </div>
  </div>
<!-- Pago Anual -->
<div class="modal fade" id="pagoAnualModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Obtener cupon de pago anual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a href="{{route('anual', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Generar pdf</a>
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>

@endsection