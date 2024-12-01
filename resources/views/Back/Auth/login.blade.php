@extends('Back.Auth.partials.auth-master',['title' => 'Admin-Login'])
@section('content')
    <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post" action="{{ route('admin.store') }}">
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

        @if (session('retry_after'))
            <div id="retry-message">
                يمكنك تسجيل الدخول مرة أخرى بعد <span id="retry-timer">{{ session('retry_after') }}</span> ثانية.
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var retryAfter = {{ session('retry_after') }};
                    var retryTimerElement = document.getElementById('retry-timer');
                    var interval = setInterval(function() {
                        retryAfter--;
                        retryTimerElement.textContent = retryAfter;
                        if (retryAfter <= 0) {
                            clearInterval(interval);
                            document.getElementById('retry-message').className = "alert alert-success";
                            document.getElementById('retry-message').textContent =
                                'يمكنك الآن محاولة تسجيل الدخول مرة أخرى.';
                        }
                    }, 1000);
                });
            </script>
        @endif

        @session('fail')
        <div class="text-danger ml-2">{{ session('fail') }}</div>
        @endsession
        @session('success')
        <div class="text-success ml-2">{{ session('success') }}</div>
        @endsession

        <h1 class="h6 mb-3">Sign in</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="login_id" value="{{ old('login_id') }}" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" autofocus>
        </div>
        @error('login_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Stay logged in
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>

        <p class="mt-3">
            <a href="{{ route('admin.password.request') }}" class="text-muted">Forgot your password?</a>
        </p>

        <p class="mt-5 mb-3 text-muted">© {{ Date('Y') }}</p>
    </form>
@endsection
