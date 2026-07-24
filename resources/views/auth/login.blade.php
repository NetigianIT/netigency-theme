<x-guest-layout>
    <div
        x-data="{
            dark: document.documentElement.classList.contains('dark'),
            showPassword: false,
            loading: false,
            toastVisible: {{ ($errors->any() || session('status')) ? 'true' : 'false' }},
            toggleTheme() {
                this.dark = !this.dark;
                document.documentElement.classList.toggle('dark', this.dark);
                localStorage.setItem('theme', this.dark ? 'dark' : 'light');
            },
            init() {
                if (this.toastVisible) {
                    setTimeout(() => { this.toastVisible = false }, 5000);
                }
            }
        }"
        class="auth-page"
    >
        <button
            type="button"
            class="auth-theme-toggle"
            @click="toggleTheme"
            :aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'"
        >
            <svg x-show="!dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
            </svg>
            <svg x-show="dark" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
            </svg>
        </button>

        @if ($errors->any() || session('status'))
            <div
                class="auth-toaster"
                x-show="toastVisible"
                x-transition:enter="auth-toaster-enter"
                x-transition:enter-start="auth-toaster-enter-start"
                x-transition:enter-end="auth-toaster-enter-end"
                x-transition:leave="auth-toaster-leave"
                x-transition:leave-start="auth-toaster-leave-start"
                x-transition:leave-end="auth-toaster-leave-end"
                role="alert"
            >
                @if ($errors->any())
                    <div class="auth-toaster__item auth-toaster__item--error">
                        <div class="auth-toaster__body">
                            <p class="auth-toaster__title">{{ __('Whoops! Something went wrong.') }}</p>
                            @foreach ($errors->all() as $error)
                                <p class="auth-toaster__message">{{ $error }}</p>
                            @endforeach
                        </div>
                        <button type="button" class="auth-toaster__close" @click="toastVisible = false" aria-label="Close">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if (session('status'))
                    <div class="auth-toaster__item auth-toaster__item--success">
                        <div class="auth-toaster__body">
                            <p class="auth-toaster__message">{{ session('status') }}</p>
                        </div>
                        <button type="button" class="auth-toaster__close" @click="toastVisible = false" aria-label="Close">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
        @endif

        <div class="auth-shell">
            <div class="auth-form-wrap">
                <form method="POST" action="{{ route('login') }}" class="auth-form" @submit="loading = true">
                    @csrf

                    <div>
                        <label for="email" class="auth-label">{{ __('Email') }}</label>
                        <input
                            id="email"
                            class="auth-input"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            :disabled="loading"
                        >
                    </div>

                    <div>
                        <label for="password" class="auth-label">{{ __('Password') }}</label>
                        <div class="auth-input-wrap">
                            <input
                                id="password"
                                class="auth-input"
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="current-password"
                                :disabled="loading"
                            >
                            <button
                                type="button"
                                class="auth-eye"
                                @click="showPassword = !showPassword"
                                :aria-label="showPassword ? 'Hide password' : 'Show password'"
                                :disabled="loading"
                            >
                                <svg x-show="!showPassword" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="showPassword" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="auth-meta-row">
                        <label class="auth-check">
                            <input type="checkbox" name="remember" :disabled="loading">
                            <span>{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="auth-link">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="auth-submit" :disabled="loading" :class="{ 'is-loading': loading }">
                        <span class="auth-submit__label" x-show="!loading">{{ __('Login') }}</span>
                        <span class="auth-submit__spinner" x-show="loading" x-cloak aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
