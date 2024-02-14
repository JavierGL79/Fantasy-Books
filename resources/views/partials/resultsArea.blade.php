@if($libros && count($libros) > 0)
    <ul>
        @foreach($libros as $libro)
        <div class="card card-body text-black">
            <li>
                <a href="{{ route('books.BookPage', ['id' => $libro->id]) }}">{{ $libro->titulo }}</a>
            </li>
        </div>
        @endforeach
    </ul>
@else
<div class="alert alert-info text-center">
    {{__('Sorry, no books currently registered')}}.
</div>
@endif