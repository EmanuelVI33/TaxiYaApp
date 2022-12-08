@extends('layouts.app')

@section('contenido')
    <form class="p-6 flex flex-col justify-center" action="{{ Route('vehiculo.update', $carro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="numeric" name="id" class="hidden" value="{{$carro->id}}">
        <div class="flex flex-col mt-2">
            <label for="placa" class="text-lg font-semibold">Placa</label>
            <input type="text" name="placa" id="placa" placeholder="placa" value="{{ $carro->placa }}"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
        </div>
        <div class="flex flex-col mt-2">
            <label for="marca" class="text-lg font-semibold">Marca</label>
            <input type="text" name="marca" id="marca" placeholder="marca" value="{{ $carro->marca }}"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
        </div>
        <div class="flex flex-col mt-2">
            <label for="modelo" class="text-lg font-semibold">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="modelo" value="{{ $carro->modelo }}"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
        </div>
        <div class="flex flex-col mt-2">
            <label for="anio" class="text-lg font-semibold">Año</label>
            <input type="date" name="anio" id="anio" placeholder="Año" value="{{ date('Y-m-d') }}"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
        </div>

        <div class="flex flex-col mt-2">
            <label for="estado" class="text-lg font-semibold">Estado</label>
            <input type="text" name="estado" id="estado" value="{{ $carro->estado }}"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
        </div>

        <div class="flex flex-col mt-2">
            <label for="propietario" class="text-lg font-semibold">Propietario</label>
            <select name="id_conductor"
                class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                @forelse ($propietarios as $propietario)
                    @if ($propietario->nombre == $carro->propietario)
                        <option selected="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                    @else
                        <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                    @endif
                @empty
                @endforelse
            </select>
        </div>

        <button type="submit"
            class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Registrar</button>
    </form>
@endsection
