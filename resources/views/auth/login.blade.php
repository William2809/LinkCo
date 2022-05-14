<x-guest-layout>
    <div class="flex place-content-between items-center text-green-100 antialiased">
        <div>
            <div class="text-heading1 text-green-100 font-semibold w-[600px]">
                Welcome Back to <a class="text-lime-300">LINK & CO</a>
            </div>
            <div class="text-green-100 text-body font-500">
                Don't have an account? <a href="{{ route('register') }}" class="underline text-lime-300">Create a new
                    one</a>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="text-center pb-[8px]">
                <p class="text-green-100 text-heading2 font-semibold">
                    Login
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="w-[560px]">
                @csrf

                <!-- Email Address -->
                <div>
                    {{-- <x-label for="email" :value="__('Email')" /> --}}
                    <p class="text-heading5 font-medium">Email</p>
                    <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')"
                        placeholder="Email" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    {{-- <x-label for="password" :value="__('Password')" /> --}}
                    <p class="text-heading5 font-medium">Password</p>


                    <x-input id="password" class="block mt-2 w-full" type="password" name="password"
                        placeholder="Password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded text-green-600 " name="remember">
                        <span class="ml-2 text-green-100">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="text-right">
                    @if (Route::has('password.request'))
                        <p class="text-green-100">Forgot your password?
                            <a class="underline text-sm text-lime-300 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Click here') }}
                            </a>
                        </p>
                    @endif
                </div>
                <div class="flex items-center justify-end mt-4">

                    <x-button class="w-full justify-center">
                        Login
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
