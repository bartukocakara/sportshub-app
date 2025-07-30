<div class="form-group">
    <h4 for="sport_type">{{ __('messages.sport_type') }}</h4>
    <select id="sport_type" data-control="select2" name="sport_type_id" class="form-control form-select text-dark">
        <option value="">{{ __('messages.select_sport') }}</option>
        @foreach ($datas['sport_types'] as $item)
            <option value="{{ $item->id }}"
                @if(old('sport_type_id', request()->get('sport_type_id')) == $item->id) selected @endif
                data-image="{{ asset("storage/".$item->img) }}">
                {{ $item->title }}
            </option>
        @endforeach
    </select>
</div>
