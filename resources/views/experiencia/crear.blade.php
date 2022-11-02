@extends("layouts.base")
@section("title","Experiencia")
@section("content")
    <form method="POST" action="@if($id){{route('experiencia.actualizar',["id"=>$id])}}@else{{route('experiencia.crear')}}@endif">
        @csrf
        @include("components.input-text",["name"=>"nombre","type"=>"text","value"=>$id ? $experiencia->nombre : "null","label"=>"Nombre"])
        @include("components.input-text",["name"=>"descripcion","type"=>"text","value"=>$id ? $experiencia->descripcion : "null","label"=>"Descripcion"])
        @include("components.input-text",["name"=>"fecha_inicio","type"=>"datetime-local","value"=>$id ? $experiencia->fecha_inicio : "null","label"=>"Fecha inicio"])
        @include("components.input-text",["name"=>"fecha_fin","type"=>"datetime-local","value"=>$id ? $experiencia->fecha_fin : "null","label"=>"Fecha final"])
        @include("components.select",["name"=>"empresa_id","type"=>"select","selected"=>$id ? "true" : "false","label"=>"Empresa","valores"=>$empresas])
        @include("components.button",["type"=>"submit","value"=>$id ? "valor_boton_modificar" : "valor_boton_crear","color"=>"danger"])
    </form>
@endsection