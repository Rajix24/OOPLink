@extends('layout.auth')
@section("auth-btn")
@endsection
@section("auth-action")
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

        <div class="form-floating mb-3">
            <input  name="name" type="text" class="form-control" id="firstName" name="first_name" placeholder="John" required>
            <label for="firstName">full Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            <label for="email">Email address</label>
        </div>

        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
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
            <button class="btn btn-primary btn-lg" type="submit">Create Account</button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="small mb-0">Already have an account? <a href="/login" class="fw-bold text-decoration-none">Login
                    here</a></p>
        </div>
    </form>
@endsection
