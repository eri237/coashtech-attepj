<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            Atte
        </h2>
    </x-slot>
    <x-auth-card>
        <div class="text-center text-xl font-bold">会員登録</div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-8">
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
                <x-button class="block mt-1 w-full">
                    <p class="flex-1 text-center">会員登録</p>
                </x-button>

            </div>

            <div class="mt-4 text-center">
                <p>
                    アカウントをお持ちの方はこちらから
                </p>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ログイン
                </a> 　　　　　　　
            </div>
        </form>
    </x-auth-card>
    <x-slot name="footer">
        <div class="font-bold text-base text-center text-gray-800 leading-tight">
            Atte,inc
        </div>
    </x-slot>
</x-guest-layout>