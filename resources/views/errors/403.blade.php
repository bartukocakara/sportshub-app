{{-- resources/views/errors/403.blade.php --}}
@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="container text-center my-5">
    <h1 class="display-4">{{ __('messages.access_denied') }}</h1>
    <p class="lead">{{ __('messages.access_denied_prompt') }}</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">{{ __('messages.back') }}</a>
</div>
@endsection
