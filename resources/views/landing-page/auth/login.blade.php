<x-landing.guest title="login">
    <x-auth-card>

        <form method="POST" action="{{ route('landing.login') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="email" :value="__('Email')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-form.label for="password" :value="__('Password')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="password" class="block w-full" type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-purple-500 border-gray-300 rounded focus:border-purple-300 focus:ring focus:ring-purple-500 dark:border-gray-600 dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember">

                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Remember me') }}
                        </span>
                    </label>

                </div>

                <div>
                    <x-button class="justify-center w-full gap-2" variant="orange">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />

                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-landing.guest>