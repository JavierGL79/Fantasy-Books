@if(request()->is('profile/*'))
    <div class="col-md-4">
        <h4>Al pulsar "Eliminar Usuario", el usuario será eliminado permanentemente del sistema</h4>
        <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" id="delete">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">{{__('Delete User')}}</button>    
        </form>
    </div>
@endif
    
