<div class="row mb-0">
    <div class="col-md-6 offset-md-4 text-center" id="Botonera"> 
        @guest
            <!-- Muestra el botón de volver para usuarios no autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__('Back')}}</a>
        @else
        <!-- Mostrar siempre el botón de volver para usuarios autenticados -->
        <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__($cancelButton ?? 'Cancel')}}</a>
            <!-- Muestra el botón de "Préstame el libro!" para usuarios autenticados-->
            @if(request()->is('books/*/edit') == false && isset($libro) && isset($libro->stock) && $libro->stock > 0)
               <form method="POST" action="{{ route('prestar-libro', ['id' => $libro->id]) }}">
                    @csrf
                    <button class="btn btn-secondary" id="prestarLibro" data-libro-id="{{ $libro->id }}">{{__('Préstame el libro!')}}</button>
                </form>
            @endif

            <!-- Muestra el botón accesible para los bibliotecarios -->
            @if(Auth::user()->es_bibliotecario)
                @include('layouts.deleteButton')
                @if(isset($libro))
                    @can('editBook', $libro)
                        @csrf
                        <form action="{{ route('books.EditBook', ['id' => $libro->id]) }}" method="GET">
                            <button type="submit" class="btn btn-primary" id="apply">{{__($buttonText) }}</button>
                        </form>
                    @endcan
                @endif
            @endif
        @endguest
    </div>
</div>