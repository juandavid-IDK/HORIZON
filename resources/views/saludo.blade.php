@extends('layouts.app')
@section('Horizon','saludo')
@section('content')
<body>
    <h1>Saludo: {{ $nombre }}</h1>
    <p>Esta vista fue generada con blade</p>
    @if(count($libros) > 0)
    <ul>
        @foreach($libros as $libro)
            <li>{{ $libro }}</li>
        @endforeach
    </ul>
    @else
    <p>No hay libros para mostrar.</p>
    @endif
</body>
</html>