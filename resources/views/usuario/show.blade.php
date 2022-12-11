@extends('layouts.app')

@section('contenido')
    <h3 class="text-xl lg:text-4xl text-center font-bold mb-5">Usuario: {{ $user->nombre }}</h3>

    <div class="flex justify-center flex-col sm:flex-row">
        <div class="text-sm lg:text-2xl mx-5 text-white bg-slate-800 rounded-lg p-3 mb-2">
            
            <h3 class="font-bold text-center mb-2">Datos Personales</h3>

            {{-- Nombre --}} 
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Nombre: </label>
                <p> {{$user->nombre}}</p>
            </div>
            
            {{-- Apellido --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Apellido: </label>
                <p> {{$user->apellido}}</p>
            </div>

            {{-- Fecha de Nacimiento --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Teléfono: </label>
                <p> {{$user->telefono}}</p>
            </div>

            {{-- Telefono --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Correo: </label>
                <p> {{$user->email}}</p>
            </div>
           
        </div>

        {{-- <div class="border-black rounded-xl bg-slate-800 p-2">
            @if ($empleado->image)
                <img 
                    src="{{ asset('empleado-fotos' . '/' . $empleado->image ) }}" 
                    alt="Imagen de Empleado"
                    class="w-80 h-80 m-auto"
                >
            @else 
                <img src="imagenes/usuario-default.png" alt="Imagen por default">   
            @endif
        </div> --}}
    </div>

@endsection