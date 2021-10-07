@extends('layouts.app')
@section('contenido')
<head>
<h1 align=center>Plan</h1>
</head>
<br>
<br>
<br>
<div class="row">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <!--Es un espacio (Es rancio lo se pero bueno para safar alcanza jeje)-->
    <div class="card text-white bg-dark mb-3" align=center style="width: 18rem;">
    <div class="card-body">
            <h1 class="card-title" align=center >Plan A</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary center">Mas info</a>
        </div>
    </div>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <div class="card text-white bg-dark mb-3" align=center style="width: 18rem;">
        <div class="card-body">
            <h1 class="card-title" align=center>Plan B</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary">Mas info</a>
        </div>
    </div>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <div class="card text-white bg-dark mb-3" align=center style="width: 18rem;">
    <div class="card-body">
            <h1 class="card-title" align=center>Plan C</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary">Mas info</a>
        </div>
    </div>
</div>
    <div >
      <a href="{{route('dashboard')}}" class="shadow bg-purple-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-2 "><i class="fa fa-pencil mr-1"></i>Volver</a>
    </div>



@endsection
