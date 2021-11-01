
@extends('layouts.app')
@section('contenido')
<head>
<h1 align=center>Planes</h1>
</head>

@if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

<div class="row">
@foreach($planes as $plan)
    <div class="card text-white bg-dark mb-3 ml-4 w-47" align=center style="width: 30rem;">
    
    <div class="card-body">
        
            <h1 class="card-title" align=center >{{$plan->name}}</h1>
            
                @foreach($prestP[$plan->id] as $pp)
                    @foreach($planP[$plan->id] as $porcent)
                        @if($porcent->prestation_id == $pp->id)
                        <div class="row">
                            <h4  align=left>{{$pp->name}} {{$porcent->percentage}} %</h4> &nbsp; &nbsp;
                        </div>
                        @endif
                    @endforeach
                @endforeach
                
        
            
        </div>
    </div>
    @endforeach
</div>

<!--<a  href="https://www.google.com/">Iniciar sesion</a>
<button onclick="window.location.href='https://www.google.com/'">Iniciar sesion</button>-->
<div class="col text-center">
    <a href="{{ route('login') }}" class="btn btn-dark" align=center>Iniciar sesion</a>
</div>

@endsection
