
@extends('layouts.app')
@section('contenido')
<head>
<h1 align=center>Conoce nuestros planes veganos</h1>
</head>
<br>
<br>
<br>
<div class="row">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <!--Es un espacio (Es rancio lo se pero bueno para safar alcanza jeje)-->
    <div class="card text-white bg-dark mb-3" style="width: 18rem;">
    <div class="card-body">
            <h1 class="card-title" align=center>Plan A</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary">Mas info</a>
        </div>
    </div>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <div class="card text-white bg-dark mb-3" style="width: 18rem;">
        <div class="card-body">
            <h1 class="card-title" align=center>Plan B</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary">Mas info</a>
        </div>
    </div>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <div class="card text-white bg-dark mb-3" style="width: 18rem;">
    <div class="card-body">
            <h1 class="card-title" align=center>Plan C</h1>
            <h4  align=center>Prestacion 1</h4>
            <h4  align=center>Prestacion 2</h4>
            <h4  align=center>Prestacion 3</h4>
            <a href="#" class="btn btn-secondary">Mas info</a>
        </div>
    </div>
</div>

<!--<a  href="https://www.google.com/">Iniciar sesion</a>
<button onclick="window.location.href='https://www.google.com/'">Iniciar sesion</button>-->
<div class="col text-center">
    <a href="{{ route('login') }}" class="btn btn-dark" align=center>Iniciar sesion</a>
</div>
@endsection
