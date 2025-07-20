@props([
    'followId' => null,
    'followableId',
    'followableType',
])

@if (!$followId)
    <form action="{{ route('follows.store') }}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="followable_id" value="{{ $followableId }}">
        <input type="hidden" name="followable_type" value="{{ $followableType }}">
        <button type="submit" class="btn btn-sm btn-outline-secondary btn-hover-light text-nowrap">
            <i class="fas fa-user-plus me-1"></i> {{ __('messages.follow') }}
        </button>
    </form>
@else
    <form action="{{ route('follows.destroy', ['id' => $followId]) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-light btn-hover-secondary text-nowrap">
            <i class="fas fa-user-minus me-1"></i> {{ __('messages.unfollow') }}
        </button>
    </form>
@endif
