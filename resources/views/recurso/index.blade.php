@extends("layouts.base")
    @section("title","Prueba")
    @section("content")
        @auth
        <h1>Usuario Registrado</h1>
        @endauth

        @guest
        <h1>Usuario no registrado</h1>
        @endguest
@endsection