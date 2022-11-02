    @extends("layouts.base")
    @section("title","estudios")
    @section("content")
        <br>
        <table>
            <tr>
                @if(count($estudios) == 0)
                    <th>{{trans_choice("message.valor_estudio",0)}}</th>
                @elseif(count($estudios) == 1)
                    <th>{{trans_choice("message.valor_estudio",1)}}</th>
                @elseif(count($estudios) > 1)
                <th>{{trans_choice("message.valor_estudio",2)}}</th>
                @endif
                    <th>Grado</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
            </tr>
            @foreach($estudios as $estudio)
                <tr>
                    <td></td>
                    <td>{{$estudio->nombre}}</td>
                    <td>{{$estudio->grado}}</td>
                    <td>@include("components.button",["onclick"=>"eliminar(".$estudio->id.")","type"=>"button","color"=>"danger","value"=>"valor_boton_eliminar"])</td>
                    <td><a class="btn btn-primary" href="{{route('educacion.editar',["id"=>$estudio->id])}}">{{__('message.valor_boton_modificar')}}</a></td>
                </tr>
            @endforeach
        </table>
        
            <a class="btn btn-success" href="{{route('educacion.crear')}}">{{__('message.valor_boton_crear')}}</a>

            @if(count($estudios) == 0)
            {{"(".trans_choice("message.valor_count_estudio",0,["count"=>count($estudios)]).")"}}
            @elseif(count($estudios) == 1)
            {{"(".trans_choice("message.valor_count_estudio",1,["count"=>count($estudios)]).")"}}
            @elseif(count($estudios) > 1)
            {{"(".trans_choice("message.valor_count_estudio",2,["count"=>count($estudios)]).")"}}
            @endif
    @endsection

    @section("js")
    <script>
        function eliminar(id)
        {
            var res = confirm("Deseas eliminar este estudio");
            if(res){
                jQuery.ajax({
                    url:"{{route('educacion.eliminar')}}",
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

