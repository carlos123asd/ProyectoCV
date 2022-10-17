@extends("layouts.base")
@section("title","registro")
@section("content")
<div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <form method="POST" action="{{route('usuario.iniciar')}}">
                    @csrf
                    @include("components.input-text",["name"=>"email","type"=>"email","label"=>"Correo electrónico"])
                    @include("components.input-text",["name"=>"password","type"=>"password","label"=>"password"])
                    @include("components.button",["type"=>"submit","value"=>"iniciar","color"=>"success"])
                </form>
            </div>
        </div>
</div>
@endsection