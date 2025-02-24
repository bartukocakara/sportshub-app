@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Security Settings</h2>
    <form>
        <div class="form-group">
            <label for="two-factor-auth">Two-Factor Authentication</label>
            <input type="text" class="form-control" id="two-factor-auth" value="{{ $data['two_factor_auth'] }}" disabled>
        </div>
        <div class="form-group">
            <label for="last-login">Last Login</label>
            <input type="text" class="form-control" id="last-login" value="{{ $data['last_login'] }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update Security Settings</button>
    </form>
</div>
@endsection
