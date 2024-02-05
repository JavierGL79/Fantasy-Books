<?php

namespace App\Providers;

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
    public function subscribe(Dispatcher $events): array
        {
        return [
            AvisoPrestamoBibliotecario::class => 'handleAvisoPrestamoBibliotecario',
            AvisoPrestamo::class => 'handleAvisoPrestamo',
            LibroDevuelto::class => 'handleLibroDevuelto',
            LibroPrestado::class => 'handleLibroPrestado',
            PrestamoModificado::class => 'handlePrestamoModificado',
        ];
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
