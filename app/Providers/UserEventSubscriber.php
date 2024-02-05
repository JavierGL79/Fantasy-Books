<?php

namespace App\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Event;

class UserEventSubscriber
{
    /**
    * Handle user login events.
    */
    public function handleUserCreado(UserCreado $event): void {
        //
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
    
    public function subscribe(Dispatcher $events): array
        {
        return [
            UserCreado::class => 'handleUserCreado',
            UserModificado::class => 'handleUserModificado',
            UserEliminado::class => 'handleUserModificado'
        ];
        }
}