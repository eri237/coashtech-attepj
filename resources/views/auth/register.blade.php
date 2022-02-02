<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atte
        </h2>
    </x-slot>
    <x-auth-card>
        <h1>会員登録</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder=名前 :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder=メールアドレス :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder=パスワード />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder=確認用パスワード />
            </div>

            <div class="mt-4">
                <x-button class="ml-4">
                    会員登録
                </x-button>

            </div>

            <div class="flex items-center justify-end mt-4">
                <p>アカウントをお持ちの方はこちらから</p>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ログイン
                </a>
            </div>
        </form>
    </x-auth-card>
    <x-slot name="footer">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atte,inc
        </h2>
    </x-slot>
</x-guest-layout>