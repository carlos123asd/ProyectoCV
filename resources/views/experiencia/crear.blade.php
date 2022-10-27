@extends("layouts.base")
@section("title","Experiencia")
@section("content")

    <form method="POST" action="@if($id){{route('experiencia.actualizar')}}@else{{route('experiencia.crear')}}@endif">
        @csrf
        @include("components.input-text",["name"=>"nombre","type"=>"text","label"=>"Nombre"])
        @include("components.input-text",["name"=>"descripcion","type"=>"text","label"=>"Descripcion"])
        @include("components.input-text",["name"=>"fecha_inicio","type"=>"datetime-local","label"=>"Fecha inicio"])
        @include("components.input-text",["name"=>"fecha_fin","type"=>"datetime-local","label"=>"Fecha final"])
        @include("components.select",["name"=>"empresa_id","type"=>"select","label"=>"Empresa","valores"=>$empresas])
        @include("components.button",["type"=>"submit","value"=>$id ? "valor_boton_modificar" : "valor_boton_crear","color"=>"danger"])
    </form>
@endsection