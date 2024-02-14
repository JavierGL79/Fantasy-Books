<form action="{{ url('/') }}" method="GET" class="text-center" style="max-width: 50%; margin: auto;">
        <div class="card-body">
            <div class="input-group mb-3 d-flex align-items-center">
                <h4 class="mb-0">
                    <label for="title_search_query" class="mb-0">{{__('By title')}}:&nbsp;</label>
                </h4>
                <input type="text" class="form-control" id="title_search_query" placeholder="{{__('Search books')}} {{__('by title')}}" name="title_search_query" value="{{ $title_search_query }}">
            </div>
            <div class="input-group mb-3 d-flex align-items-center">
                <h4 class="mb-0">
                    <label for="author_search_query" class="mb-0">{{__('By author')}}:&nbsp;</label>
                </h4>
                <input type="text" class="form-control" id="author_search_query" placeholder="{{__('Search books')}} {{__('by author')}}" name="author_search_query">
            </div>
            <div class="input-group mb-3 d-flex align-items-center">
                <h4 class="mb-0">
                    <label for="year_search_query" class="mb-0">{{__('By year')}}:&nbsp;</label>
                </h4>
                <input type="text" class="form-control" id="year_search_query" placeholder="{{__('Year of edition')}}" name="year_search_query">&nbsp;&nbsp;

                <h4 class="mb-0">
                    <label for="year_range_start" class="mb-0">{{__('By year range')}}:&nbsp;</label>
                </h4>
                <input type="text" class="form-control" id="year_range_start" placeholder="{{__('Start year')}}" name="year_range_start">
                <span class="input-group-text">-</span>
                <input type="text" class="form-control" id="year_range_end" placeholder="{{__('End year')}}" name="year_range_end">
            </div>

            <button class="btn btn-primary" type="submit">{{__('Search books')}}</button>
        </div>
    </form>