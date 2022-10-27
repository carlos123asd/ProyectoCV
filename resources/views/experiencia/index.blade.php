@extends("layouts.base")
@section("title","Experiencia")
@section("content")
    <h1>Experiencias</h1>
    @foreach($experiencias as $experiencia)
        <h2>{{$experiencia->nombre}}</h2>
        @include("components.button",["onclick"=>"eliminar(".$experiencia->id.")","type"=>"button","color"=>"danger","value"=>"valor_boton_eliminar"])
    @endforeach
    <a class="btn btn-success" href="{{route('experiencia.viewcrear')}}">{{__('message.valor_boton_crear')}}</a>
@endsection
@section("js")
<script>
    function eliminar(id)
    {
        var res = confirm("Deseas eliminar esta experiencia");
        if(res){
            jQuery.ajax({
                url:"{{route('experiencia.eliminar')}}",
                method:"DELETE",
                data:{id:id},
            })
        }
    }
</script>
@endsection