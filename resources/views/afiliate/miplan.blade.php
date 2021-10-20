@extends('layouts.app')
@section('contenido')
<head>
<h1 align=center>Plan</h1>
</head>
<div class="row">
@foreach($planes as $plan)
    <div class="card text-white bg-dark mb-3" align=center style="width: 18rem;">
    
    <div class="card-body">
        
            <h1 class="card-title" align=center >{{$plan->name}}</h1>
            
                @foreach($prestP[$plan->id] as $pp)
                    @foreach($planP[$plan->id] as $porcent)
                        @if($porcent->prestation_id == $pp->id)
                        <div class="col">
                            <h4  align=center>{{$pp->name}}</h4> 
                            <h3  align=center>{{$porcent->percentage}} %</h3>
                        </div>
                        @endif
                    @endforeach
                @endforeach
                
        
            
        </div>
    </div>
    @endforeach
</div>
    <div >
      <a href="{{route('dashboard')}}" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2 "><i class="fa fa-pencil mr-1"></i>Volver</a>
    </div>



@endsection
