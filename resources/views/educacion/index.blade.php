    @extends("base")
    @section("title","estudios")
    @section("content")

    <h1>Estudios</h1>
    <br>
    <table>
        <tr>
            <th>Grado</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($estudios as $estudio)
        <tr>
            <td>{{ $estudio->grado }}</td>
            <td>{{ $estudio->nombre }}</td> 
            <td><a href="{{route('educacion.editar',['id'=> $estudio->id])}}">Modificar</a></td>
            <!--  <td><a href="{{ route('educacion.eliminar', ['id'=>$estudio->id]) }}">Eliminar</a></td> -->
            <td><button onclick="eliminarDato({{ $estudio->id }})">Eliminar</button></td> {{-- educacion.eliminar --}} 
        </tr>
        @endforeach
    </table>
    <div id="resultado"></div>
    
   {{-- <a href="{{ route('estudios.actualizar',['id'=>$estudio->id]) }}">Actualizar</a>
    <a href="{{ route('educacion.eliminar', ['id'=>$estudio->id]) }}">Eliminar</a> <!--setear id-->
    --}}
   
    <script>
        function objetoAjax(){
            var xmlhttp=false;
            try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
            try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
            xmlhttp = false;
            }
            }
            if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
            xmlhttp = new XMLHttpRequest();
            }
            return xmlhttp;
        }

        function eliminarDato(ideducacion){
            //donde se mostrará el resultado de la eliminacion
            divResultado = document.getElementById('resultado');
            //usaremos un cuadro de confirmacion
            var eliminar = confirm("De verdad desea eliminar este dato?")
            if ( eliminar ) {
                //instanciamos el objetoAjax
                ajax=objetoAjax();
                //uso del medotod GET
                //indicamos el archivo que realizará el proceso de eliminación
                //junto con un valor que representa el id del empleado
                ajax.open("GET", "{{ route('educacion.eliminar') }}/"+ideducacion);
                ajax.onreadystatechange=function() {
                    if (ajax.readyState==4) {
                        //mostrar resultados en esta capa
                       location.reload();
                    }
                }
                //como hacemos uso del metodo GET
                //colocamos null
                ajax.send(null)
            }
        }
    </script>

@endsection