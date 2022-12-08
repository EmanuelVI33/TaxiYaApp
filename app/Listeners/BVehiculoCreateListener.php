<?php

namespace App\Listeners;

use App\Models\BitacoraVehiculo;
use App\Events\BVehiculoCreateEvent;
use App\Models\Vehiculo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class BVehiculoCreateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BVehiculoCreateEvent  $event
     * @return void
     */
    public function handle(BVehiculoCreateEvent $event)
    {
        // dd($event);
        $vehiculo = new BitacoraVehiculo();
        $vehiculo->user = Auth::user()->nombre;
        $vehiculo->accion = 'crear';
        $vehiculo->fecha = now();
        $vehiculo->hora = now();
        $vehiculo->vehiculo_id = $event->bvehiculocreate->id;
        $vehiculo->ip = $event->bvehiculocreate->ip;
        //desde aqui son los datos creados
        $vehiculo->placa = $event->bvehiculocreate->placa;
        $vehiculo->marca = $event->bvehiculocreate->marca;
        $vehiculo->modelo = $event->bvehiculocreate->modelo;
        $vehiculo->anio = $event->bvehiculocreate->anio;
        $vehiculo->estado = $event->bvehiculocreate->estado;
        $vehiculo->id_conductor = $event->bvehiculocreate->id_conductor;
        $vehiculo->save();
    }
}
