<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            {{-- <img src="/shop.png" alt="" width="50%"> --}}
            {{-- <h1 style="font-size: 65px; color: green">Sayur Shop</h1> --}}
        </x-slot>
        
        <x-jet-validation-errors class="mb-4" />
        <div class="flex items-center justify-center">
            <img src="/shop.png" alt="" width="40%">
        </div>
        <div class="flex items-center justify-center mb-4">
            <h1 style="font-size: 30px">Sayur Shop</h1>
        </div>
        
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus placeholder="Email" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

               
            </div>
            <hr>
            <div class="fotter">
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
                <a class="badge bg-success" href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
