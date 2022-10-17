    @extends("base")
    @section("title","Crear")
    @section("content")
{{--<form method="POST" action="@if($estudio){{ route('educacion.edit',['id'=>$estudio->id]) }}@else{{ route('educacion.create') }}@endif ">
        @csrf
        <label for="grado">Grado:</label>
        <input name="grado" type="text" value="@isset($estudio->grado){{$estudio->grado}}@endisset">
        <label for="nombre">Nombre:</label>
        <input name="nombre" type="text" value="@isset($estudio->nombre){{$estudio->nombre}}@endisset">
        <label for="fecha_inicial">Fecha inicial:</label>
        <input name="fecha_inicial" type="datetime-local" value="@isset($estudio->fecha_inicial){{$estudio->fecha_inicial}}@endisset">
        <label for="fecha_final">Fecha Final:</label>
        <input name="fecha_final" type="datetime-local" value="@isset($estudio->fecha_final){{$estudio->fecha_final}}@endisset">
        <input type="submit" value="@if($estudio) Guardar @else Crear @endif">
    </form> --}}

    <form method="POST" action="@if($id){{route('educacion.modificar',['id'=>$estudio->id])}}@else{{route('educacion.create')}}@endif">
        @csrf
        <label for="grado">Grado:</label>
        <input name="grado" type="text" value="@isset($estudio->grado){{$estudio->grado}}@endisset">
        <label for="nombre">Nombre:</label>
        <input name="nombre" type="text" value="@isset($estudio->nombre){{$estudio->nombre}}@endisset">
        <label for="fecha_inicial">Fecha inicial:</label>
        <input name="fecha_inicial" type="datetime-local" value="@isset($estudio->fecha_inicial){{$estudio->fecha_inicial}}@endisset">
        <label for="fecha_final">Fecha final:</label>
        <input name="fecha_final" type="datetime-local" value="@isset($estudio->fecha_final){{$estudio->fecha_final}}@endisset">
        <input type="submit" value="@if($id) modificar @else crear @endif">
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    @endsection