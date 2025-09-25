{{-- <link href="{{ asset('techmin/css/app-custom.css') }}" rel="stylesheet" type="text/css" /> --}}
<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xxl-9 col-lg-11" >
            <div class="card overflow-hidden">
                <div class="row g-0">
                    <!-- Left side: Form -->
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            {{-- <div class="auth-brand p-4 text-center">
                                <a href="/" class="logo-light">
                                    <img src="{{ asset('techmin/images/logo.png') }}" alt="logo" height="28">
                                </a>
                                <a href="/" class="logo-dark">
                                    <img src="{{ asset('techmin/images/logo-dark.png') }}" alt="dark logo" height="28">
                                </a>
                            </div> --}}
                            <div class="p-4 my-auto text-center">

                                <h4 class="fs-20">Login Aplikasi</h4>
                                <p class="text-muted mb-4">Masukan Email dan Password Akun anda</p>

                                <form method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" class="form-control" type="email" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" class="form-control" type="password" name="password" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="mb-0 text-start">
                                        <button class="btn btn-soft-primary w-100"  type="submit">Log In</button>
                                    </div>

                                    <!-- Forgot password -->
                                    @if (Route::has('password.request'))
                                        <div class="mt-3 text-end">
                                            <a href="{{ route('password.request') }}" class="text-muted">
                                                Forgot your password?
                                            </a>
                                        </div>
                                    @endif
                                </form>

                                {{-- <!-- Social login (optional) -->
                                <div class="text-center mt-4">
                                    <p class="text-muted fs-16 mb-2">Sign in with</p>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="#" class="btn btn-soft-primary"><i class="ri-facebook-circle-fill"></i></a>
                                        <a href="#" class="btn btn-soft-danger"><i class="ri-google-fill"></i></a>
                                        <a href="#" class="btn btn-soft-info"><i class="ri-twitter-fill"></i></a>
                                        <a href="#" class="btn btn-soft-dark"><i class="ri-github-fill"></i></a>
                                    </div>
                                </div> --}}

                                <!-- Register link -->
                                {{-- <div class="text-center mt-3">
                                    <p class="text-muted">
                                        Don't have an account? 
                                        <a href="{{ route('register') }}" class="text-dark fw-bold text-decoration-underline">Sign up</a>
                                    </p>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                    <!-- Right side: Image -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{ asset('techmin/images/logo-puske.png') }}" alt="" class="img-fluid rounded h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
