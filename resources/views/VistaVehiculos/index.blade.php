@extends('layouts.app')

@section('contenido')
    <div class="mt-4 mx-4">
        <div class="md:col-span-2 xl:col-span-3 text-center font-semibold">
            <p class="text-lg">Lista de Automóviles</p>
        </div>

        <div class="flex items-center p-2">
            {{-- Julico --}}
            <form action="{{ Route('repo-cliente') }}" id="form" class="hidden lg:block" method="POST">
                @csrf
                @method('POST')
                <div class="flex mx-1">
                    <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1">
                        <label for="fecha_antes"> Creado Desde</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2
                dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="date" min="2000-01-01" max="{{ date('Y-m-d H:i:s') }}" name="fecha_antes"
                            value="{{ $fecha_antes }}">
                    </div>
                    <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1">
                        <label for="fecha_hasta"> Creado Hasta</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2
                dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="date" min="2000-01-01" max="{{ date('Y-m-d H:i:s') }}" name="fecha_hasta"
                            value="{{ $fecha_hasta }}">
                    </div>
                    <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1">
                        <label for="formato"> Formato de Reporte</label><br>
                        <select id="formato" name="formato"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-2 p-2
                dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1">EXCEL</option>
                            <option value="2">PDF</option>
                            <option value="3">HTML</option>
                        </select>
                    </div>
                    <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1 pt-5">
                        <button target="_blank" class="flex justify-evenly  dark:bg-gray-100 text-white bg-blue-600 rounded-full px-3 py-2 h-fit"
                            type="submit">
                            <p class="text-white mx-1">Descargar</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
            {{-- end --}}
            <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1 pt-5">
                <a href="{{ Route('vehiculo.create') }}" target="_blank"
                    class="flex justify-evenly bg-blue-600 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-full px-2 py-2 h-fit">
                    <p class="text-white mx-1 pt-1">Registrar</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </a>
            </div>
            <div class="sm:row-start-3 lg:row-start-2 xl:row-start-1 mx-1 pt-5">
                <a href="{{ Route('bitacora') }}" target="_blank"
                    class="flex justify-evenly bg-blue-600 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 rounded-full px-2 py-2 h-fit">
                    <p class="text-white mx-1 pt-1">Bitacora</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            {{-- <div class="relative w-full max-w-full flex pb-2 flex-1 text-right">
                                <a href="{{ Route('vehiculo.create') }}"
                                    class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    Registrar un Vehiculo</a>

                                <a href="{{ Route('vehiculo.pdf') }}" target="_blank"
                                    class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Imprimir
                                </a>
                                <a href="{{ Route('bitacora') }}" target="_blank"
                                    class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Bitacora
                                </a>
                            </div> --}}
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Placa</th>
                                <th class="px-4 py-3">Marca</th>
                                <th class="px-4 py-3">Modelo</th>
                                <th class="px-4 py-3">Año</th>
                                <th class="px-4 py-3">Estado</th>
                                <th class="px-4 py-3">Propietario</th>
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($carros as $cars)
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <p class="font-semibold">{{ $cars->id }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm uppercase">{{ $cars->placa }}</td>
                                    <td class="px-4 py-3 text-xs uppercase">{{ $cars->marca }}</td>
                                    <td class="px-4 py-3 text-xs upercase ">{{ $cars->modelo }}</td>
                                    <td class="px-4 py-3 text-xs ">{{ $cars->anio }}</td>
                                    @if ($cars->estado == 'HABILITADO')
                                        <td class="px-2 py-2 text-sm"><span
                                                class=" text-lime-500 bg-green-100 rounded-full p-1.5">{{ $cars->estado }}</span>
                                        </td>
                                    @else
                                        <td class="px-2 py-2 text-sm"><span
                                                class=" text-red-700 bg-red-100 rounded-full p-1.5">{{ $cars->estado }}</span>
                                        </td>
                                    @endif
                                    <td class="px-4 py-3 text-xs capitalise">{{ $cars->propietario }}</td>
                                    <td class="px-4 py-3 text-xs">

                                        <button type="button"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            <a href="{{ Route('vehiculo.edit', $cars->id) }}">
                                                EDITAR
                                            </a></button>

                                        <button type="button"
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                            <form action="{{ Route('vehiculo.destroy', $cars->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- @dd($cars->id); --}}
                                                <input type="number" value="{{ $cars->id }}" class="hidden">
                                                <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')">
                                            </form>
                                        </button>

                                        <button type="button">
                                            <form action="{{ Route('vehiculo.estado', $cars->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="numeric" name="id" class="hidden"
                                                    value="{{ $cars->id }}">
                                                <input type="text" name="placa" class="hidden"
                                                    value="{{ $cars->placa }}">
                                                <input type="text" name="marca" class="hidden"
                                                    value="{{ $cars->marca }}">
                                                <input type="text" name="modelo" class="hidden"
                                                    value="{{ $cars->modelo }}">
                                                <input type="date" name="anio" class="hidden"
                                                    value="{{ $cars->anio }}">
                                                <input type="numeric" name="propietario" class="hidden"
                                                    value="{{ $cars->id_conductor }}">

                                                @if ($cars->estado == 'HABILITADO')
                                                    <input type="text" name="estado" value="MANTENIMIENTO"
                                                        class="hidden">
                                                    <input type="submit" value="DESHABILITAR"
                                                        class="px-2 py-1 font-semibold leading-tight text-black bg-gray-300 rounded-full dark:text-red-100 dark:bg-red-700"
                                                        onclick="return confirm('Desea deshabilitar el Vehiculo?')">
                                                @else
                                                    <input type="text" name="estado" value="HABILITADO"
                                                        class="hidden">
                                                    <input type="submit" value="HABILITAR"
                                                        class="px-2 py-1 font-semibold leading-tight text-black bg-lime-300 rounded-full dark:text-red-100 dark:bg-red-700"
                                                        onclick="return confirm('Desea habilitar el Vehiculo?')">
                                                @endif
                                            </form>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <span
                                    class="px-2 pd-2 md-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                    No hay Vehiculos cargados en la BD.
                                </span>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
    {{-- siguiente seccion --}}

    <div class="mt-4 mx-4">
        <div class="md:col-span-2 xl:col-span-3 text-center font-semibold">
            <p class="text-lg">Mapa</p>
        </div>
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    Hola mundo
                    <br>
                    <label id="demoxd" value="getLocation()"></label>

                    <br>
                    <button class="telefono" onclick="getLocation()">Obtener Ubicacion</button>
                    <p id="demo"></p>
                    <div class="w-1/2">
                        <x-maps-leaflet :centerPoint="['lat' => -17.8489585, 'long' => -63.1678671]" :markers="[['lat' => -17.8489585, 'long' => -63.1678671]]" :zoomLevel="14"></x-maps-leaflet>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="findMe()">Mostrar ubicación</button>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1aJEiTGum8cnVPccg8KEVx97VLQweSko"></script>
    <script>
        function findMe() {
            var output = document.getElementById('map');
            // Verificar si soporta geolocalizacion
            if (navigator.geolocation) {
                output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
            } else {
                output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
            }
            //Obtenemos latitud y longitud
            function localizacion(posicion) {
                var latitude = posicion.coords.latitude;
                var longitude = posicion.coords.longitude;
                var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude +
                    "&size=600x300&markers=color:red%7C" + latitude + "," + longitude +
                    "&key=AIzaSyD1aJEiTGum8cnVPccg8KEVx97VLQweSko";
                output.innerHTML = "<img src='" + imgURL + "'>";
            }

            function error() {
                output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
            }
            navigator.geolocation.getCurrentPosition(localizacion, error);
        }

        // aqui va otra funcion muy aparte esta sirve para obtener mi latitud y longitud por medio de mi navegador
        var x = document.getElementById("demoxd");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            // x.innerHTML = position.coords.longitude;
            // x.innerHTML ="Latitude: " + position.coords.latitude +
            // "<br>Longitude: " + position.coords.longitude;
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
            var imgURL = "";
        }
    </script>
@endsection
