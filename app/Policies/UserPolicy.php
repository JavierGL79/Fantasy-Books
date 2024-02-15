<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        // Un usuario puede ver su propio perfil o si es bibliotecario puede ver todos los perfiles
        return $user->id === $model->id || $user->es_bibliotecario;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Un usuario puede editar su propio perfil o si es bibliotecario puede editar todos los perfiles
        return $user->id === $model->id || $user->es_bibliotecario;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Solo los bibliotecarios pueden eliminar perfiles
        return $user->es_bibliotecario;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        // Solo los bibliotecarios pueden restaurar perfiles
        return $user->es_bibliotecario;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Solo los bibliotecarios pueden eliminar permanentemente perfiles
        return $user->es_bibliotecario;
    }
}
