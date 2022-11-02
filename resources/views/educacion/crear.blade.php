    @extends("layouts.base")
    @section("title","Crear")
    @section("content")
    <form method="POST" action="@if($id){{route('educacion.modificar',['id'=>$id])}}@else{{route('educacion.create')}}@endif">
        @csrf
        @include("components.input-text",["name"=>"grado","type"=>"text","value"=>$id ? $educacion->grado : "null","label"=>"Grado"])
        @include("components.input-text",["name"=>"nombre","type"=>"text","value"=>$id ? $educacion->nombre : "null","label"=>"Nombre"])
        @include("components.input-text",["name"=>"fecha_inicial","type"=>"datetime-local","value"=>$id ? $educacion->fecha_inicio : "null","label"=>"Fecha Inicio"])
        @include("components.input-text",["name"=>"fecha_final","type"=>"datetime-local","value"=>$id ? $educacion->fecha_inicio : "null","label"=>"Fecha Fin"])
        @include("components.button",["type"=>"submit","value"=>$id ? "valor_boton_modificar" : "valor_boton_crear","color"=>"success"])
    </form>
    {{-- ejemplo de pluralismo en la traduccion {{trans_choice("message.valor_experiencia",1)}} --}}
     {{--si queremos mostrar algun error, respuesta del controlador--}}
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif 
    @endsection