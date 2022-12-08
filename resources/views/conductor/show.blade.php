@extends('layouts.app')
@section('contenido')

<h3 class="text-center font-bold text-2xl py-3">
    Editar Conductor {{ $conductor->nombre . ' ' . $conductor->apellido }}
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('conductor.update', $conductor->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mt-4 flex items-center">
            <div class="m-4 p-2 mt-2 bg-gray-800 rounded">
                <label class="text-white font-bold">Foto de perfil</label>
                <img src="{{asset('storage'.'/'.$conductor->foto)}}" alt="" class="w-100 h-100 mt-3">
            </div>

            <div>
                <div class="flex">
                    <div>
                        <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
                        <x-text-input readonly id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $conductor->cliente->user->nombre }}" />
                    </div>
                    <div>
                        <x-input-label class="text-gray-800" for="apellido" :value="__('Apellido')" />
                        <x-text-input readonly id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{ $conductor->cliente->user->apellido }}"  />
                    </div>
                </div>

                <div class="flex">
                    <div>
                        <x-input-label class="text-gray-800" for="ci" :value="__('Carnet de Identidad')" />
                        <x-text-input readonly id="ci" class="block mt-1 w-full" type="text" name="ci" value="{{ $conductor->ci }}" />
                    </div>
                    <div>
                        <x-input-label class="text-gray-800" for="telefono" :value="__('Teléfono')" />
                        <x-text-input readonly id="telefono" class="block mt-1 w-full" type="text" name="telefono" value="{{ $conductor->cliente->user->telefono }}" />
                    </div>
                </div>

                <div class="flex">
                    <div>
                        <x-input-label class="text-gray-800" for="email" :value="__('Email')" />
                        <x-text-input readonly id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $conductor->cliente->user->email}}" />
                    </div>
                    <div>
                        <x-input-label class="text-gray-800" for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                        <x-text-input readonly id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" value="{{ $conductor->cliente->fecha_nacimiento}}" />
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 flex gap-1 bg-slate-100 mt-2">
            <img src="{{asset('storage'.'/'.$conductor->CI_Anverso)}}" alt="" class="container w-200 h-200">
            <img src="{{asset('storage'.'/'.$conductor->CI_Reverso)}}" alt="" class="container w-200 h-200">
        </div>

        <div class="p-4 flex gap-1 bg-slate-100 mt-2">
            <img src="{{asset('storage'.'/'.$conductor->fotoLicencia)}}" alt="" class="container w-200 h-200">
            <img src="{{asset('storage'.'/'.$conductor->fotoTIC)}}" alt="" class="container w-200 h-200">
            <img src="{{asset('storage'.'/'.$conductor->fotoAntecedente)}}" alt="" class="container w-200 h-200">
        </div>

        {{-- <div class="p-4 flex gap-1 bg-slate-100">
            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de licencia')" />
                <x-text-input readonly id="image" class="block mt-1 w-full" type="file" name="fotoLicencia" value="" />
            </div>

            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de TIC')" />
                <x-text-input readonly id="image" class="block mt-1 w-full" type="file" name="fotoTIC" value="" />
            </div>
            
            <div>
                <x-input-label class="text-gray-800" for="image" :value="__('Cambiar foto de antecedentes')" />
                <x-text-input readonly id="image" class="block mt-1 w-full" type="file" name="fotoAntecedentes" value="" />
            </div>
        </div> --}}

    </form>   

@endsection