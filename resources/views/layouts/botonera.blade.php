<div class="row mb-0">
    <div class="col-md-6 offset-md-4 text-center" id="Botonera"> 
        @guest
            <!-- Mostrar solo el botón de volver para usuarios no autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__('Back')}}</a>
        @else
            <!-- Mostrar el botón de "Préstame el libro!" para usuarios autenticados -->
            @if(Auth::user()->es_bibliotecario)
                <a href="#" class="btn btn-success" id="prestarLibro">{{__('Préstame el libro!')}}</a>
            @endif

            <!-- Mostrar el botón de aceptar para bibliotecarios -->
            @if(Auth::user()->es_bibliotecario)
                <button type="submit" class="btn btn-primary" id="aceptar">{{__($buttonText) }}</button>
                
                <!-- Mostrar el botón de reset solo en la página de edición -->
                @if(request()->is('EditBookPage'))
                    <button type="reset" class="btn btn-secondary" id="reset">{{__('Restore text')}}</button>
                @endif
            @endif

            <!-- Mostrar siempre el botón de volver para usuarios autenticados -->
            <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__($cancelButton ?? 'Cancel')}}</a>
        @endguest
    </div>
</div>
