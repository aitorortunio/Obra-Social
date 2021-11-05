@auth
<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


    <li class="nav-item active">
      <a class="nav-link" href="{{route('/')}}">Obra Social</a>
    </li>

        @if(Auth::user()->hasRole('afiliado')) 
            <li>
              <a href="{{route('afiliate-show', ['dni'=> Auth::user()->documento])}}" type="button" class="btn btn-dark mb-4">Mis datos</a>
            </li>
        @endif

        @if(Auth::user()->hasRole('admin'))
          <li>
            <a href="{{route('user-show', ['id'=> Auth::user()->id])}}" type="button" class="btn btn-dark mb-4">Mis datos</a>
          </li>  
        @endif

        @if(Auth::user()->hasRole('admin'))
          <li>
            <a href="{{route('empleado-index')}}" type="button" class="btn btn-dark mb-4">Gestión de usuarios</a>
          </li>
        @endif
        
        @if(Auth::user()->hasRole('admin'))
        <li>        
            <a href="{{route('plan')}}" type="button" class="btn btn-dark mb-4 ">Gestión de planes</a>
        </li>
        @endif 
        
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('empleado'))
        
          <li><a href="{{route('index')}}" type="button" class="btn btn-dark mb-4">Gestión de afiliados</a></li>
          <li><a href="{{route('gestion')}}" type="button" class="btn btn-dark mb-4">Gestión de solicitudes</a></li>
        
        @endif

        @if(Auth::user()->hasRole('afiliado'))
          <li><a href="{{route('planes-show')}}" type="button" class="btn btn-dark mb-4">Planes</a></li>
          <li><a href="{{route('solicitud', ['dni'=> Auth::user()->documento])}}" type="button" class="btn btn-dark mb-4">Solicitudes</a></li>
          <li><a href="{{route('index_cupon')}}" type="button" class="btn btn-dark mb-4">Obtener cupon de pago</a></li>
        @endif

        <div class="navbar-nav my-2 my-lg-0">
            <form method="POST" action="{{ route ('logout' )}}" calss="nav-item">
                @csrf
                
                <a href="#" type="button" class="btn btn-dark" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();" >Cerrar sesion</a>
            </form>
        </div>
    
  </ul>

</nav>
@endauth