@if($nombre)
<h1>{{$nombre}}</h1>
@else
<h2>Indicame el nombre</h2>
@endif
@forelse($coleccion as $elemento)
<h2>{{$elemento}}</h2>
@empty
<h1>No hay elementos</h1>
@endforelse

{{--Crear controlador, crear accion(recibir numero y saber si es suficiente,insu,notable,sobre,bien/si no viene un numero -> mandar mensaje), crear enrutamiento, crear vista--}}
