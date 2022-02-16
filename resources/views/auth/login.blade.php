<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            Atte
        </h2>
    </x-slot>
    <x-auth-card>
        <div class="text-center text-xl font-bold">ログイン</div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-8">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder=メールアドレス :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder=パスワード />
            </div>

            <div class="mt-4">
                <x-button class=" block mt-1 w-full">
                    <p class="flex-1 text-center">ログイン</p>
                </x-button>
            </div>

            <div class="mt-4 text-center">
                <p>
                    アカウントをお持ちでない方はこちらから
                </p>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    会員登録
                </a>
            </div>

            <!-- Remember Me -->
            <!-- <div class="block mt-4"> -->
            <!-- <label for="remember_me" class="inline-flex items-center"> -->
            <!-- <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember"> -->
            <!-- <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> -->
            <!-- </label> -->
            <!-- </div> -->

            <!-- <div class="flex items-center justify-end mt-4"> -->
            <!-- @if (Route::has('password.request')) -->
            <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}"> -->
            <!-- {{ __('Forgot your password?') }} -->
            <!-- </a> -->
            <!-- @endif -->


            </div>
        </form>
    </x-auth-card>
    <x-slot name="footer">
        <div class="font-bold text-base text-center text-gray-800 leading-tight">
            Atte,inc
        </div>
    </x-slot>
</x-guest-layout>