@if ($table->hasFilters())
    <div class="table__filters">
        {{ form_open(['method' => 'get', 'id' => 'filters', 'url' => url()->full()]) }}
        <input type="hidden" name="{{ $table->getOption('prefix') }}limit" value="{{ $table->getOption('limit') }}">
        <input type="hidden" name="{{ $table->getOption('prefix') }}view" value="{{ $table->getActiveViewSlug() }}">
        <input type="hidden" name="{{ $table->getOption('prefix') }}page" value="1">

        @foreach ($table->getFilters() as $filter)
            <div class="table__filter">
                {!! $filter->getInput() !!}
            </div>
        @endforeach

        <button type="submit" class="button -primary">
            {{-- {{ icon(table.options.filters.filter_icon ?: 'filter') }} --}}
            {{ trans('streams::button.filter') }}
        </button>
        <a href="{{ $filter->url() }}" class="button -ghost">
            {{-- {{ icon(table.options.filters.clear_icon ? table.options.filters.clear_icon) }} --}}
            {{ trans('streams::button.clear') }}
        </a>
        {{ form_close() }}
    </div>
@endif