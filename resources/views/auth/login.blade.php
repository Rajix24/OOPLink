@extends('layout.auth')
@section("auth-btn")
<a href="{{ route('register') }}" class="btn btn-primary singUp">Sing up</a>
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
        <div class="mb-3">
            <label class="input-lable" for="email">Email</label>
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="user@example.com"required>
        </div>

        <div class="mb-3">
            <label class="input-lable" for="Password">Password</label>
            <!-- <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"required> -->
             <x-bar_input name="password" placeholder="Enter password" id="floatingPassword"></x-bar_input>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
            <label class="form-check-label" for="rememberMe">
                Remember me
            </label>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-lg auth-submit-btn" type="submit">Login</button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="small mb-0">Don't have an account? <a href="#">Sign Up</a></p>
            <a href="#" class="small">Forgot password?</a>
        </div>
    </form>
</div>
    @endsection
