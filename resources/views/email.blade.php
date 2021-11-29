<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test mail</title>
</head>
<body>

    <p>{{$data['body']}}</p>
    <p>Saludos, </p> <br>
    <p>{{auth()->user()->apellido}} {{auth()->user()->nombre}} </p>
</body>
</html>