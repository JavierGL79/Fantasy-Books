<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;


class BookPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Book $libro)
    {
        
        return true; //Todos pueden ver los libros
    }

    public function createBook(User $user)
    {
        return $user->es_bibliotecario; // Sólo los bibliotecarios pueden crear libros
    }
    
    public function editBook(User $user, Book $libro)
    {
        return $user->es_bibliotecario; // Sólo lo bibliotecarios pueden editar libros
    }
}
