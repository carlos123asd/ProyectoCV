@extends("base")
    @section("title","Crear")
    @section("content")
        <table>
            <tr>
                <th>Empresa</th>
                <th>Experiencias</th>
            </tr>
            <tr>
                <td>{{$empresa->nombre}}</td>
                <td>{{$empresa->experiencias()}}</td> {{--Montar vista relacional--}}
            </tr>
        </table>
    @endsection