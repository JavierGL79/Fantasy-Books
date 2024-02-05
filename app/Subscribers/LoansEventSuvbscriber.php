<?php

namespace App\Subscribers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Event;

class LoansEventSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe(Dispatcher $events)
    {
        // Escuchar eventos relacionados con préstamos aquí
        $events->listen(
            'App\Events\PrestamoFinalizadoEvent',
            'App\Subscribers\LoansEventSubscriber@handlePrestamoFinalizado'
        );

        // Agrega más listeners según sea necesario
    }

    /**
     * Handle prestamo finalizado event.
     *
     * @param  \App\Events\PrestamoFinalizadoEvent  $event
     * @return void
     */
    public function handlePrestamoFinalizado(PrestamoFinalizadoEvent $event)
    {
        // Lógica para manejar la finalización de préstamos
        // Accede al préstamo usando $event->prestamo
        // Envía notificaciones, realiza acciones, etc.
    }
}
