
@extends('layouts.app')
@section('contenido')

<br>
<div class="col-sm-3 w-full "><h3><b>Mis datos</b></h3></div>
     
  <form action="{{ route('afiliate-update-Afiliado', ['id' => $afiliado->dni]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')


    @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

      <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Nombre</label>
          <input class="title bg-gray-100 border border-dark-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="name" id="afiliate_name" required value="{{old('name', $afiliado->name)}}" readonly>
          
            <!-- @error('name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label  class="col-sm-2 col-form-label mb-4">Apellido</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="last_name" id="afiliate_last_name" required value="{{old('last_name', $afiliado->last_name)}}" readonly>

            <!-- @error('last_name')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
                        <label for="Tipo" class="col-sm-2 col-form-label">Documento</label>
                            <div class="col-sm-10 mb-4">
                                <select class="custom-select" name="dni_type" readonly>
                                    <option  selected value="{{$afiliado->dni_type}}">{{$afiliado->dni_type}} </option>
                                </select>
                            </div>
            @error('dni_type')
              <label class="col-form-label col-sm-10 red" style="color:red">Seleccione un tipo de documento</label>
            @enderror
        </div>
        <div class="form-group">
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="Numero" type="integer" name="dni" id="afiliate_dni" required value="{{old('dni', $afiliado->dni)}}" readonly>

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="Date" class="col-sm-2 col-form-label mb-4">Fecha de Nacimiento</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="date" name="birth_date" id="birth_date" required value="{{old('birth_date', $afiliado->birth_date)}}" readonly>

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label for="provincia" class="col-sm-2 col-form-label mb-4">Provincia</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="province" id="provincia"required value="{{old('province', $afiliado->province)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Ciudad</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="city" id="ciudad" required value="{{old('city', $afiliado->city)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="street" id="calle" required value="{{old('street', $afiliado->street)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Número de calle</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="text" name="house_number" id="numeroCalle" required value="{{old('house_number', $afiliado->house_number)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Email</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="" type="email" name="email" id="email" required value="{{old('email', $afiliado->email)}}">

            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->

        </div>

       
        <div class="form-group">
        <label class="col-sm-2 col-form-label mb-4">Telefono</label>
          <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full " autofill="off" autocomplete="off" placeholder="+54 (cod area) numero" type="integer" name="tel" id="telefono" pattern=".{8,}"
          oninvalid="setCustomValidity('Al menos 8 caracteres')"
          onchange="try{setCustomValidity('')}catch(e){}" required value="{{old('tel', $afiliado->tel)}}">
          
            <!-- @error('dni')
              <small class="danger">{{$message}}</small>
            @enderror -->
            @error('tel')
              <label class="col-form-label col-sm-10 red" style="color:red">Tiene que ser de tipo numérico</label>
            @enderror
        </div>


        <label for="inputPassword3" class="col-sm-2 col-form-label">Plan</label>
        <div class="form-group row">
          <div class="col-sm-10">
              <select class="custom-select" name="plan">
                  @foreach($planes as $plans) 
                    <option value="{{$plans->id}}" {{old('name', $plan->name) == $plans->name ? "Selected" : ""}}>{{$plans->name}}</option>
                  @endforeach
              </select>
            </div>
        </div>




   <label for="inputPassword3" class="col-sm-2 col-form-label">Tipo de plan</label>
  <div class="form-group row">
    <div class="col-sm-10">
        <select class="custom-select" name="tipo">
            @foreach($tipos as $tips) 
              <option value="{{$tips->id}}" {{old('tipo', $tipo->name) == $tips->name ? "Selected" : ""}}>{{$tips->name}}</option>
            @endforeach
        </select>
    </div>
  </div>




  <div class="col text-center">
          @if($afiliado->titular_id === null)
            @if($tipo->name === 'Familia 2 hijos')
              @if($cantMiembros < '3')
                    <a href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar miembro</a>
              @else
                    <button href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar miembro</button>
              @endif
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                  Ver mis familiares
               </button>
            @elseif($tipo->name === 'Familia 3 hijos')
              @if($cantMiembros < 4)
                <a href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar miembro</a>
              @else
                <button href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar miembro</button>
              @endif
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                  Ver mis familiares
               </button>
              @elseif($tipo->name === 'Pareja Joven')
                @if($cantMiembros < 1)
                  <a href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center">Agregar pareja</a>
                @else
                <button href="{{route('add-familiar-Admin', ['idTitular' => $afiliado->dni])}}" type="button" class="btn btn-dark" style="float:center" disabled>Agregar pareja</button>
                @endif
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                  Ver mis familiares
               </button>
              @endif
           
          @endif


            
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Familiares</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  
                    <table class="table">
                <thead>
                @if($cantMiembros != 0) 
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                
                  @foreach($miembros as $miembro)
                    <tr>
                      <td>{{$miembro->name}}</td>
                      <td>{{$miembro->last_name}}</td>
                      <td>
                      <div class="row">
                        <a href="{{route('eliminar-miembroAfiliado', ['id' => $miembro->id])}}" type="button" class="btn btn-dark" >Dar de baja</a>
                        <a href="{{route('miembro-showAfiliado', ['id' => $miembro->id])}}" class="view" title="View"><i class="material-icons col-xs-6">&#xE417;</i></a>
                      </div>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                @else
                  No hay miembros en el grupo familiar
                @endif
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
              
            </div>
          </div>
        </div>
        
      </div> 

      <br>

          <!-- buttons -->
          <div class="col text-center">
            <button class="btn btn-dark" >Aceptar</button>
            <a href="{{route('index')}}" onclick="return confirm('¿Desea cancelar la operacion?')" class="btn btn-dark">Cancelar</a>
            <a href="{{route('afiliado-delete', ['id' => $afiliado->dni])}}" class="btn btn-danger" onclick="return confirm('¿Desea darse de baja de baja de la obra social?')">Dar de baja</a> 
          </div>
    </div>
  </form>
  @endsection