<div class="row mb-0">
    <div class="col-md-6 offset-md-4 text-center" id="Botonera"> 
        @if(Auth::check())
            @if(Auth::user()->es_bibliotecario)
                <button type="submit" class="btn btn-primary" id="aceptar">{{__($buttonText) }}</button>
                @if(request()->is('EditBookPage'))
                    <button type="reset" class="btn btn-secondary" id="reset">{{__('Restore text')}}</button>
                @endif 
            @endif
            @if(request()->is('books/*'))
                <a href="#" class="btn btn-success" id="prestarLibro">{{__('Préstame el libro!')}}</a>
            @endif
        @endif    
        <a href="#" onclick="history.back(); return false;" class="btn btn-danger" id="cancel">{{__($cancelButton ?? 'Cancel')}}</a>
</div>