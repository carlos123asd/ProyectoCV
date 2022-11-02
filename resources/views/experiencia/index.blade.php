@extends("layouts.base")
@section("title","Experiencia")
@section("content")
    <table>
        <tr>
            @if(count($experiencias) == 0)
                <th>{{trans_choice("message.valor_experiencia",0)}}</th>
            @elseif(count($experiencias) == 1)
                <th>{{trans_choice("message.valor_experiencia",1)}}</th>
            @elseif(count($experiencias) > 1)
             <th>{{trans_choice("message.valor_experiencia",2)}}</th>
            @endif
            <th></th>
        </tr>
        @foreach($experiencias as $experiencia)
            <tr>
                    <td>{{$experiencia->nombre}}</td>
                    <td>@include("components.button",["onclick"=>"eliminar(".$experiencia->id.")","type"=>"button","color"=>"danger","value"=>"valor_boton_eliminar"])</td>
                    <td><a class="btn btn-primary" href="{{route('experiencia.viewactualizar',["id"=>$experiencia->id])}}">{{__('message.valor_boton_modificar')}}</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <a class="btn btn-success" href="{{route('experiencia.viewcrear')}}">{{__('message.valor_boton_crear')}}</a>
    @if(count($experiencias) == 0)
        {{"(".trans_choice("message.valor_count_experiencia",0,["count"=>count($experiencias)]).")"}}
        @elseif(count($experiencias) == 1)
        {{"(".trans_choice("message.valor_count_experiencia",1,["count"=>count($experiencias)]).")"}}
        @elseif(count($experiencias) > 1)
        {{"(".trans_choice("message.valor_count_experiencia",2,["count"=>count($experiencias)]).")"}}
    @endif
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
                success:function(){
                    location.reload();
                },
                data:{
                    id:id,
                    _token: "{{csrf_token()}}" ////como pasar el csrf por ajax
                }
            })
        }
    }
</script>
@endsection