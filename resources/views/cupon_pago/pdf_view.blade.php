<!DOCTYPE html>
<html>
<head>
    <title>Cupon De Pago</title>
</head>
<body>
    <h1>{{ $nombre }} {{$apellido}}</h1>
    <p>{{ $dni }}</p>
    <p>Su plan es: {{ $plan }} , {{$type}}</p>
    <p>Tipo de cupon: {{ $tipo }}</p>
    <p>Usted tiene que pagar {{ $precio }}</p>


    <img src="imagen/barcode.jpg" alt="" />
   
</body>
</html>