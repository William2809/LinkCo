<x-guest-layout>

    <div class="flex place-content-between items-center ">
        <div>
            <div>
                <div class="text-heading1 text-green-100 font-semibold w-[700px]">
                    Create New <a class="text-lime-300">LINK & CO</a> Account
                </div>
                <div class="text-green-100 text-heading5 font-semibold mt-6">
                    Start your <a class="text-lime-300">Business Connection</a> here...
                </div>
            </div>
            <div class="text-green-100 text-body font-reguler mt-5">
                Already have an account? <a href="{{ route('login') }}" class="underline text-lime-300">Log in</a>
            </div>
        </div>
        <div class="text-green-100 flex flex-col ">
            <div class="text-center pb-[8px]">
                <p class="text-heading2 font-semibold">
                    Register
                </p>
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="w-[560px]">
                @csrf

                <!-- Name -->
                <div>
                    <p class="text-heading6 font-medium">Name</p>

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        placeholder="Name" required />
                </div>

                {{-- Username --}}
                <div class="mt-3">
                    <p class="text-heading6 font-medium">Username</p>

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                        placeholder="Username" required />
                </div>

                <!-- Email Address -->
                <div class="mt-3">
                    <p class="text-heading6 font-medium">Email</p>

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        placeholder="Email" required />
                </div>

                <!-- Password -->
                <div class="mt-3">
                    <p class="text-heading6 font-medium">Password</p>

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        placeholder="Password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-3">
                    <p class="text-heading6 font-medium">Confirm Password</p>

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" placeholder="Password" required />
                </div>

                <div class="flex items-center justify-start mt-4 text-sm">
                    <input type="checkbox" name="agree" id="agree" class="rounded text-green-600 " name="agree"
                        required>

                    <p class="pl-3 text-green-100">Agree to our <a href="" class="underline text-lime-300">Privacy
                            Policy</a> and <a href="" class="underline text-lime-300">Terms of Services</a></p>
                </div>
                <x-button class="flex justify-center items-center w-full mt-4">
                    <p>Register</p>
                </x-button>
            </form>
        </div>
    </div>
</x-guest-layout>
