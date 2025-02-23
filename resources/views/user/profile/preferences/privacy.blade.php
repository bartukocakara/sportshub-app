@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Privacy Settings</h2>
    <form>
        <div class="form-group">
            <label for="profile-visibility">Profile Visibility</label>
            <input type="text" class="form-control" id="profile-visibility" value="{{ $data['profile_visibility'] }}" disabled>
        </div>
        <div class="form-group">
            <label for="searchable">Searchable</label>
            <input type="text" class="form-control" id="searchable" value="{{ $data['searchable'] }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update Privacy Settings</button>
    </form>
</div>
@endsection
