
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calcular Nota</h1>
    <form method="POST" action="{{ url('/notas') }}">
        @csrf
        <label></label>
        <input name="nota" type="text">
        <input type="submit" value="Calcular">
    </form>
    @if($resultado)
        <h1>{{$nota}}->{{$resultado}}</h1>
        {{route('notas.get',['nota'=>$nota,'resultado'=>$resultado])}}
    @else
        <h1>Escribe una nota</h1>
    @endif
</body>
</html>