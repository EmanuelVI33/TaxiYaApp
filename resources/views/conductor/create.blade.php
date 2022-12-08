@extends('layouts.app')
@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Registrar Conductor
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('conductor.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        {{-- Nombre - usuario --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>

        {{-- Apellido - usuario --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required />
        </div>

        {{-- CI - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="ci" :value="__('Carnet de Identidad')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="text" name="ci" :value="old('ci')" required />
        </div>

        {{-- Telefono - usuario --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"/>
        </div>

        {{-- Fecha de nacimiento - usuario --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="fechanac" :value="__('Fecha de nacimiento')" />
            <x-text-input id="fechanac" class="block mt-1 w-full" type="date" name="fechanac" :value="old('fechanac')" required/>
        </div>
        
        {{-- Foto perfil - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="foto" :value="__('Foto de perfil')" />
            <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" required />
        </div>

        {{-- fotoAntecedentes - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="fotoAntecedente" :value="__('Foto de antecedentes')" />
            <x-text-input id="fotoAntecedente" class="block mt-1 w-full" type="file" name="fotoAntecedente" :value="old('fotoAntecedente')" required />
        </div>

        {{-- fotoLicencia - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="fotoLicencia" :value="__('Foto de licencia')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="file" name="fotoLicencia" :value="old('fotoLicencia')" required />
        </div>

        {{-- fotoTIC - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="fotoTIC" :value="__('Foto TIC')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="file" name="fotoTIC" :value="old('fotoTIC')" required />
        </div>

        {{-- CI_Anverso - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="CI_Anverso" :value="__('Foto CI Anverso')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="file" name="CI_Anverso" :value="old('CI_Anverso')" required />
        </div>

        {{-- CI_Reverso - conductor --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="CI_Reverso" :value="__('Foto CI Reverso')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="file" name="CI_Reverso" :value="old('CI_Reverso')" required />
        </div>

        <div class="mt-4">
            <x-input-label class="text-gray-800" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-input-label class="text-gray-800" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="password_confirmation" :value="__('Repetir Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        {{-- <div class="mt-4">
            <x-input-label class="text-gray-800" for="image" :value="__('Foto de Perfil')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
        </div> --}}

        {{-- <input name="rol" type="text" value="empleado" class="hidden"> --}}

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Crear Cuenta') }}
        </x-primary-button>

    </form>   
</div>  
@endsection