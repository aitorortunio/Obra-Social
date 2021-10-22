@extends('layouts.app')
@section('contenido')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Ingresaste!
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
   
    <div class="card border-dark mb-3" align=center style="max-width: 18rem;">
        <img src="http://ieanjesus.org.ec/wp-content/uploads/OBRA-SOCIAL.png" class="card-img-top" alt="...">
        <div class="card-body">
        

        @if(Auth::user()->hasRole('afiliado')) 
            <a href="{{route('afiliate-show', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Mis datos</a>
        @endif

        @if(Auth::user()->hasRole('admin'))
            <a href="{{route('user-show', ['id'=> Auth::user()->id])}}" type="button" class="btn btn-dark mb-4">Mis datos</a>
        @endif

        @if(Auth::user()->hasRole('admin'))
            <a href="{{route('empleado-index')}}" type="button" class="btn btn-dark mb-4">Gestión de usuarios</a>
        @endif
        
        @if(Auth::user()->hasRole('admin'))
            <a href="{{route('plan')}}" type="button" class="btn btn-dark mb-4 ">Gestión de planes</a>
        @endif 
        
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('empleado'))
            <a href="{{route('index')}}" type="button" class="btn btn-dark mb-4">Gestión de afiliados</a>
            <a href="{{route('gestion')}}" type="button" class="btn btn-dark mb-4">Gestión de solicitudes</a>
        @endif

        @if(Auth::user()->hasRole('afiliado'))
        <a href="{{route('planes-show')}}" type="button" class="btn btn-dark mb-4">Planes</a>
        <a href="{{route('solicitud', ['dni'=> Auth::user()->name])}}" type="button" class="btn btn-dark mb-4">Solicitudes</a>
        <a href="" type="button" class="btn btn-dark mb-4">Obtener cupon de pago</a>
        @endif
       
        <div class="navbar-nav my-2 my-lg-0">
            <form method="POST" action="{{ route ('logout' )}}" calss="nav-item">
                @csrf
                
                <a href="#" type="button" class="btn btn-dark" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();" >Cerrar sesion</a>
            </form>
        </div>
        
</div>




    <div class="card text-white bg-white mb-3" style="width: 18rem;">
        
    
    
  </div>
</div>
    
   
    @endsection
