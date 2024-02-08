<div class="row mb-0">
    <div class="col-md-6 offset-md-4 text-center" id="Botonera"> 
        @guest
            <!-- Mostrar el botón de volver para usuarios no autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__('Back')}}</a>
        @else
            <!-- Mostrar el botón de "Préstame el libro!" para usuarios autenticados -->
            @if(isset($libro) && isset($libro->stock) && $libro->stock > 0)
                <button class="btn btn-secondary" id="prestarLibro" data-libro-id="{{ $libro->id }}">{{__('Préstame el libro!')}}</button>
            @endif

            <!-- Mostrar el botón accesible para el bibliotecarios -->
            @if(Auth::user()->es_bibliotecario)
                <button type="submit" class="btn btn-primary" id="aceptar">{{__($buttonText) }}</button>
                
                <!-- Mostrar el botón de reset solo en la página de edición de libros-->
                @if(request()->is('books/*/edit'))

                    @can('editBook', $book)
                        <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-secondary">{{__('Edit Book')}}</a>
                    @endcan
                @endif
            @endif

            <!-- Mostrar siempre el botón de volver para usuarios autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__($cancelButton ?? 'Cancel')}}</a>
        @endguest
    </div>
</div>
