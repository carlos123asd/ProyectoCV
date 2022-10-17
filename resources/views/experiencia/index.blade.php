<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($experiencias as $experiencia)
        <h2>{{$experiencia->nombre}}</h2>
    @endforeach
    <h3>{{$aeropuerto}}</h3>
</body>
</html>