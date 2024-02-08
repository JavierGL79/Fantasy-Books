<?php

namespace App\Subscriptores;

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
    
    //Modificación del préstamos
    public function handleModificacionPrestado(ModificacionPrestado $event)
    {
        // Sumar tres días a la fecha de devolución del préstamo
        $event->loan->update(['fecha_devolucion' => $event->loan->fecha_devolucion->addDays(3)]);

        // Enviar notificación al correo electrónico del usuario
        Mail::to($event->loan->user->email)->send(new PrestamoModificadoMail($event->loan));
    }

    public function subscribe(Dispatcher $events): array
        {
        return [
            AvisoPrestamoBibliotecario::class => 'handleAvisoPrestamoBibliotecario',
            AvisoPrestamo::class => 'handleAvisoPrestamo',
            LibroDevuelto::class => 'handleLibroDevuelto',
            LibroPrestado::class => 'handleLibroPrestado',
            PrestamoModificado::class => 'handleModificacionPrestado',
        ];
        }

}
