<div class="row mb-0">
    <div class="col-md-6 offset-md-4 text-center" id="Botonera"> 
        @guest
            <!-- Muestra el botón de volver para usuarios no autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__('Back')}}</a>
        @else
            <!-- Muestra el botón de "Préstame el libro!" para usuarios autenticados-->
            @if(request()->is('books/*/edit') == false && isset($libro) && isset($libro->stock) && $libro->stock > 0)
                <button class="btn btn-secondary" id="prestarLibro" data-libro-id="{{ $libro->id }}">{{__('Préstame el libro!')}}</button>
            @endif

            <!-- Muestra el botón accesible para los bibliotecarios -->
            @if(Auth::user()->es_bibliotecario)
                @can('editBook', $libro)
                    <form action="{{ route('books.EditBook', ['id' => $libro->id]) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary" id="apply">{{__($buttonText) }}</button>
                    </form>
                    
                    <!-- Botón de eliminar -->
                    @if(request()->is('books/*'))
                        <button class="btn btn-danger" id="delete" onclick="confirmDelete()">{{__('Delete Book')}}</button>
                    @elseif(request()->is('profile'))
                    <button class="btn btn-danger" id="delete" onclick="confirmDelete()">{{__('Delete User')}}</button>
                        @endif
                @endcan
                
            @endif

            <!-- Mostrar siempre el botón de volver para usuarios autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__($cancelButton ?? 'Cancel')}}</a>
        @endguest
    </div>
</div>
