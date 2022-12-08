@extends ('layouts.plantillas')

@section ('titulo', 'Curso '. $curso)

@section ('contenido')

    <h1>Bienvenido al curso con variables: {{$curso}} </h1>

@endsection