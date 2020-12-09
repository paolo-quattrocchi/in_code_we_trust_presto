<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{$style ?? ''}}
    <title>{{$title ?? 'Presto'}}</title>
</head>
<body>
   <x-navbar />
   

   

    {{$slot}}





    <x-footer />

    <script src="{{ asset('js/app.js') }}"></script>
    {{$scripts ?? ''}}
</body>
</html>