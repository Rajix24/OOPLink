@extends('layout.auth')
@section("auth-btn")
    <a class="btn btn-primary singUp" href="{{ route('login') }}">Log In</a>
@endsection
@section("auth-action")
<div class="register">
    <div class="contents">
    <div class="register-bar">
        <div class="image">
            <img src="{{ asset("storage/user.png") }}" height="auto" width="80px" alt="User">
        </div>
        <h3>Create your account</h3>
        <p>start shearing Your projects OOP </p>
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
    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class=" mb-3"> 
            <label class="input-lable" for="name">full Name</label>
            <x-bar_input name="name" type="text" placeholder="Enter name" required></x-bar_input>
        </div>
        <div class="mb-3">
            <label class="input-lable" for="email">Email address</label>
            <x-bar_input name="email" type="email" placeholder="Enter Email" id="email"></x-bar_input>
        </div>

        <div class=" mb-3">
            <label class="input-lable" for="password">Password</label>
            <x-bar_input name="password" type="password" placeholder="Enter Password" id="password" required></x-bar_input>
        </div>
        <!-- 
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm Password" required>
            <label for="password_confirmation">Confirm Password</label>
        </div> -->

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" value="" id="terms" required>
            <label class="form-check-label small" for="terms">
                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
            </label>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-lg auth-submit-btn" type="submit">Create Account</button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="small mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Login here</a></p>
        </div>
    </form>
    </div>
</div>
@endsection