@extends('Back.Auth.partials.auth-master', ['title' => 'Admin Reset Password'])

@section('content')
    <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post" action="{{ route('admin.password.store') }}">
        @csrf
         <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
        </a>
        <input type="hidden"  name="token" value="{{ $request->route('token') }}">
        <h1 class="h6 mb-3">Admin Reset Password</h1>

        <div class="form-group">
            <label for="email" class="sr-only">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" id="email"
                   class="form-control form-control-lg" placeholder="Enter your email" required>
        </div>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <label for="password" class="sr-only">New Password</label>
            <input type="password" name="password" id="password"
                   class="form-control form-control-lg" placeholder="New Password" required>
        </div>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
            <label for="password_confirmation" class="sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="form-control form-control-lg" placeholder="Confirm Password" required>
        </div>
        @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>

        <p class="mt-5 mb-3 text-muted">© {{ date('Y') }}</p>
    </form>
@endsection
