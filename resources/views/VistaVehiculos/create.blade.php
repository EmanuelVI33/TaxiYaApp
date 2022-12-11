@extends('layouts.app')

@section('contenido')
<form class="p-6 flex flex-col justify-center" action="{{Route('vehiculo.store')}}" method="POST">
    @csrf
    @method('POST')
    <div class="flex flex-col mt-2">
        <label for="placa" class="text-lg font-semibold">Placa</label>
        <input type="text" name="placa" id="placa" placeholder="placa"
            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
    </div>
    <div class="flex flex-col mt-2">
        <label for="marca" class="text-lg font-semibold">Marca</label>
        <input type="text" name="marca" id="marca" placeholder="marca"
            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
    </div>
    <div class="flex flex-col mt-2">
        <label for="modelo" class="text-lg font-semibold">Modelo</label>
        <input type="text" name="modelo" id="modelo" placeholder="modelo"
            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
    </div>
    <div class="flex flex-col mt-2">
        <label for="anio" class="text-lg font-semibold">Año</label>
        <input type="date" name="anio" id="anio" placeholder="Año" value="{{date('Y-m-d')}}"
            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
    </div>

    <div class="flex flex-col mt-2">
        <label for="estado" class="text-lg font-semibold">Estado</label>
        <input type="text" name="estado" id="estado" value="HABILITADO"
            class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
    </div>

    <div class="flex flex-col mt-2">
        <label for="estado" class="text-lg font-semibold">Propietario</label>
        <select name="propietario" id="propietario"
        class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
            @forelse ($propietario as $p)
                <option value="{{$p->id}}">{{$p->propietario}}</option>
            @empty
                <input type="text" value="No se a registrado ningun propietario">
            @endforelse
        </select>
    </div>

    <button type="submit"
        class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Registrar</button>
</form>
@endsection
