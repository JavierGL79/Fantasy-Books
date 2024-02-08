<?php

namespace App\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use App\Models\User;
use App\Events\UserCreado;
use App\Notifications\UserCreadoMail;


class UserEventSubscriber
{
    /**
    * Handle user login events.
    */
    public function handleUserCreado(UserCreado $event): void
        {
            // Obtener el usuario del evento
            $user = $event->user;
             // Enviar la notificación
            $user->notify(new UserCreadoMail());
        }

    /**
    * Handle user logout events.
    */
    public function handleUserModificado(UserModificado $event): void {
        //
        }

    /**
    * Register the listeners for the subscriber.
    *
    * @return array<string, string>
    */
    
    public function subscribe(Dispatcher $events): void
        {
            $events->listen(
                UserCreado::class,
                [UserEventSubscriber::class, 'handleUserCreado']
            );
            $events->listen(
                UserModificado::class,
                [UserEventSubscriber::class, 'handleUserModificado']
            );
            $events->listen(
                UserEliminado::class,
                [UserEventSubscriber::class, 'handleUserModificado']
            );
        }
}