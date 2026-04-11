@extends('layout.auth')
@section("auth-btn")
<button class="btn btn-primary singUp">Sing up</button>
@endsection
@section("auth-action")
<div class="login">
    <div class="welcome">
        <h3 class="well">welcome</h3>
        <p>Please enter your details to sign in.</p>
    </div>
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
        @endforeach
    </div>
    @endif
    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                required>
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"
                required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
            <label class="form-check-label" for="rememberMe">
                Remember me
            </label>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Login</button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="small mb-0">Don't have an account? <a href="#">Sign Up</a></p>
            <a href="#" class="small">Forgot password?</a>
        </div>
    </form>
    @endsection

</div>