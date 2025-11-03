<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 text-dark bg-white"
             style="max-width: 400px; width: 100%; border-radius: 15px; box-shadow: 0 0 15px rgba(0,0,0,0.2);">
            
            <!-- Logo & Judul -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/wardes.JPG') }}" 
                     alt="Logo Warung Desa" 
                     class="rounded-circle mx-auto d-block mb-3" 
                     style="width: 80px; height: 80px; object-fit: cover;">
                <h2 class="fw-bold text-dark m-0">WARDES</h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label text-dark" />
                    <x-text-input id="email"
                                  class="form-control shadow-sm text-dark"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" class="form-label text-dark" />
                    <x-text-input id="password"
                                  class="form-control shadow-sm text-dark"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label text-dark" for="remember_me">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <!-- Forgot Password & Login Button -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-underline small text-dark" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn btn-primary px-4">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</x-guest-layout>
